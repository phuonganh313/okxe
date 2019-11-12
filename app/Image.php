<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='image_clone';

    protected $fillable=['id','id_item','name','cover','base64','size','url'];

    public function item(){
    	return $this->belongsTo('App\Item','id_item');
    }

    public static function countImg($id_item){
        return DB::table('image_clone')->where('id_item', $id_item)->count();
    }
}
