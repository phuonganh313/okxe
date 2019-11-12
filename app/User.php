<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','facebook_name','facebook_url','threshold','bank_name','bank_branch','beneficiary_account','beneficiary_name','price','created_at','updated_at','id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $permission = [
        '0' => 'User',
        '1' => 'Supper admin',
    ];
    /**
     * Relationship: items
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function items(){
        return $this->hasMany('App\Item','id_user');
    }

    public function payments(){
        return $this->hasMany('App\Payment','id_user');
    }
    
    public function filter($request){
        $columns = array('id', 'name', 'email','phone', 'facebook_name', 'facebook_url', 'threshold', 'bank_name', 'bank_branch', 'beneficiary_account', 'beneficiary_name', 'price', 'created_at');

        $query = $this->select('users.id','users.name','users.email','users.phone','users.facebook_name','users.facebook_url','users.threshold','users.bank_name','users.bank_branch','users.beneficiary_account' ,'users.beneficiary_name','users.price', 'users.created_at');
        foreach($request['columns'] as $rkey=>$rvalue){
            $value = $request['columns'][$rkey]['search']['value'];
            $column  = $request['columns'][$rkey]['data'];
            if (!empty($value)) {
                if($column == 'created_at' || $column == 'last_visit'){
                    $range_date = explode('-',$request['columns'][$rkey]['search']['value']);
                    $day_from = $range_date[0];
                    $day_to = $range_date[1];

                    if ($day_from !== '') {
                        $from = date("Y-m-d",strtotime($day_from));
                        $query->where('users.'.$column,'>=',$from);
                    }
                    if ($day_to !== '') {
                        $to = date("Y-m-d",strtotime($day_to));
                        $query->where('users.'.$column,'<=',$to.' 23:59:59');
                    }
                } elseif ($column == 'status' || $column == 'id') {
                    $query->where('users.'.$column,$value);
                } else {
                    $query->where('users.'.$column,'LIKE','%'.$value.'%');
                }
            }

        }

        $total_filtered = $query->count();
        $orderColumn = $columns[$request['order'][0]['column']];
        if ($orderColumn == 'id' || $orderColumn == 'name' || $orderColumn == 'email'|| $orderColumn == 'phone' || $orderColumn == 'facebook_name' 
            || $orderColumn == 'facebook_url' || $orderColumn == 'threshold' || $orderColumn == 'bank_name' || $orderColumn == 'bank_branch' 
            || $orderColumn == 'beneficiary_account' || $orderColumn == 'beneficiary_name' || $orderColumn == 'price' || $orderColumn == 'created_at') {
            $query->orderBy($orderColumn,$request['order'][0]['dir']);
        }

        return [
            'users'=> $query->get(),
            'totalAmount' =>$this->count(),
            'totalFiltered' => $total_filtered
        ];
    }
}
