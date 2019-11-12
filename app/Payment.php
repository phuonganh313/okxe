<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payment_clone';

    protected $fillable=['id','id_user','amount','bonus','id_payer','created_at','updated_at'];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
    public static function  getAmountByIdUser($id_user){
        return DB::table('payment_clone')->where('id_user', $id_user)->sum('amount');
    }

    public static function getAmountByIdUserAndByCreatedAt($id_user){
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        return DB::table('payment_clone as p')
                    ->select(array(
                        DB::Raw('sum(p.amount) as amount'),
                        DB::Raw('sum(p.bonus) as bonus'),
                        DB::Raw('DATE(p.created_at) day')
                       )
                    )
                    ->where('id_user', $id_user)
                    ->groupBy('day')
                    ->get();
    }

    public static function getCostByDate($id_user, $date){
        return DB::table('payment_clone')->where('id_user', $id_user)->where('created_at','<=', $date)->sum('amount');
    }
}
