<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class County extends Model
{
    protected $table='county_clone';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['name'];

    public function items(){
    	return $this->hasMany('App\Item','id_county');
    }
}
