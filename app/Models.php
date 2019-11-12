<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Models extends Model
{
    protected $table='model';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['name','id_brand','active'];

    /**
     * Relationship: brand
     *
     * @return array(
     *         name => varchar,
     *         active => tinyint,
     * )
     */
    public function brand(){
    	return $this->belongsTo('App\Brand','id_brand');
    }

    public function items(){
        return $this->hasMany('App\Item','id_model');
    }

    public static function getByIdBrand($id_brand){
        return DB::table('model')->select('id', 'name')->where('id_brand', $id_brand)->get();
    }
}
