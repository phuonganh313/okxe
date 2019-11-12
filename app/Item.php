<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Item extends Model
{
    protected $table='item_clone';

    /*
    *
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['id_user','id_county','title','price','cost','description','id_brand','id_model','year','km_range','type','name','phone','link', 'active', 'imported','created_at','updated_at'];

    public $types = ['Tay côn','xe số','Tay ga'];

    public $km_ranges = [
        '0-4999',
        '5000-9999',
        '10000-14999',
       ' 15000-19999',
        '20000-24999',
        '25000-29999',
        '30000-34999',
        '35000-39999',
        '40000-44999',
        '45000-49999',
        '50000-54999',
        '55000-59999',
        '60000-64999',
        '65000-69999',
        '70000-74999',
        '75000-79999',
        '80000-84999',
        '85000-89999',
        '90000-94999',
        '95000-99999',
        '100000-109999',
        '110000-119999',
        '120000-129999',
        '130000-139999',
        '140000-149999',
        '150000-159999',
        '160000-169999',
        '170000-179999',
        '180000-189999',
        '190000-199999',
        '200000-249999',
        '250000-299999',
        '300000-349999',
        '350000-399999',
        '400000-449999',
        '450000-499999',
    ];
    /**
     * Relationship: user
     * @param 
     * @return array(
     *         name=>varchar,
     *         email =>varchar,
     *         password => varchar,
     *         facebook_name = > varchar,
     *         facebook_url => varchar,
     *         threshold => float,
     *         bank_name =>varchar,
     *         phone => varchar,
     *         bank_branch => varchar,
     *         beneficiary_account => varchar, 
     *         date_add =>datetime,
     *         date_upd =>datetime,
     *         active =>tinyint
     * )
     */
    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }

     /**
     * Relationship: model
     * @param 
     * @return array(
     *         name => varchar,
     *         id_brand => int,
     *         active => tinynt,
     * )
     */
    public function model(){
    	return $this->belongsTo('App\Models','id_model');
    }

    /**
     * Relationship: brand
     * @param 
     * @return array(
     *         name => varchar,
     *         active => tinynt,
     * )
     */
    public function brand(){
    	return $this->belongsTo('App\Brand','id_brand');
    }   

    /**
     * Relationship: country
     * @param 
     * @return array(
     *         name => varchar, 
     *         id_provine => int,
     *         active => tinynt,
     * )
     */
    public function county(){
    	return $this->belongsTo('App\County','id_county');
    }

    public function images(){
    	return $this->hasMany('App\Image','id_item');
    }

    public static function countItemByIdUser($id_user){
        return DB::table('item_clone')->where('id_user', $id_user)->count();
    }

    public static function getAmountByIdUser($id_user){
        return DB::table('item_clone')->where('id_user', $id_user)->sum('cost');
    }

    public static function getItemByIdUser($id_user){
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        return DB::table('item_clone as i')
                    ->select(array(DB::Raw('count(i.id) as quantity'),
                        DB::Raw('sum(i.cost) as amount'),
                        DB::Raw('DATE(i.created_at) day'))
                    )
                    ->where('id_user', $id_user)
                    ->groupBy('day')
                    ->get();
    }

    public static function getCostByDate($id_user, $date){
       return DB::table('item_clone')->where('id_user', $id_user)->where('created_at','<=', $date)->sum('cost');
    }

    public function filter($request, $id_user = null){
        $columns = array('id','id_user','id_county','title','price','cost','description','id_brand','id_model','year','km_range','type','name','phone','link','active','imported','created_at');
        $query = $this->select('item_clone.id', 'item_clone.id_user' , 'item_clone.id_county' , 'item_clone.title' , 'item_clone.price' , 'item_clone.cost' , 'item_clone.description' , 
                                'item_clone.id_brand' , 'item_clone.id_model' , 'item_clone.year' , 'item_clone.km_range', 'item_clone.type','item_clone.name','item_clone.phone'
                                ,'item_clone.link', 'item_clone.active', 'item_clone.imported', 'item_clone.created_at');
        foreach($request['columns'] as $rkey=>$rvalue){
            $value = $request['columns'][$rkey]['search']['value'];
            $column  = $request['columns'][$rkey]['data'];

            if (!empty($value)) {
                if($column == 'created_at' || $column == 'expired_date'){
                    $range_date = explode('-',$request['columns'][$rkey]['search']['value']);
                    $day_from = $range_date[0];
                    $day_to = $range_date[1];
                    if ($day_from !== '') {
                        $from = date("Y-m-d",strtotime($day_from));
                        $query->where('item_clone.'.$column,'>=',$from);
                    }
                    if ($day_to !== '') {
                        $to = date("Y-m-d",strtotime($day_to));
                        $query->where('item_clone.'.$column,'<=',$to.' 23:59:59');
                    }
                } elseif ($column == 'status' || $column == 'id') {
                    $query->where('item_clone.'.$column,$value);
                } else {
                    $query->where('item_clone.'.$column,'LIKE','%'.$value.'%');
                }
            }
        }
        if($id_user){
            $query->where('item_clone.'.'id_user','=', $id_user);
        }
        $total_filtered = $query->count();
        $orderColumn = $columns[$request['order'][0]['column']];
        if ($orderColumn == 'id' || $orderColumn == 'id_county' || $orderColumn == 'title'|| $orderColumn == 'price' || $orderColumn == 'cost' 
            || $orderColumn == 'description' || $orderColumn == 'id_brand'|| $orderColumn == 'id_model' || $orderColumn == 'year' 
            || $orderColumn == 'km_range' || $orderColumn == 'type'|| $orderColumn == 'name' || $orderColumn == 'phone' || $orderColumn == 'link' || $orderColumn == 'created_at') {
            $query->orderBy($orderColumn,$request['order'][0]['dir']);
        }
        if ($orderColumn == 'users') {
            $query->leftJoin('users',function($join){ $join->on('users.id','=','item_clone.id_user'); });
            $query->orderBy('users.'.$orderColumn,$request['order'][0]['dir']);
        } else {
            $query->orderBy($orderColumn,$request['order'][0]['dir']);
        }
        $query->skip($request['start'])->take($request['length']);
        return [
            'license'=> $query->get(),
            'totalAmount' =>$this->count(),
            'totalFiltered' => $total_filtered
        ];
    }
}
