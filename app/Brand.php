<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Brand extends Model
{
    protected $table='brand';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['name','active','id_employee'];

    /**
     * Relationship: items
     *
     * @return array(
     *       name => varchar,
     *       description => text,
     *       color => varchar,
     *       id_county => int,
     *       id_province => int,
     *       id_user => int,
     *       id_brand => int,
     *       id_model => int,
     *       type => enum,
     *       engine_power => enum
     *       price => double,
     *       seri => varchar,
     *       date_add => date_time,
     *       date_upd => date_time,
     *       status => enum,  
     * )
     */
    public function items(){
        return $this->hasMany('App\Item','id_brand');
    }

    /**
     * Relationship: models
     *
     * @return array(
     *        name => varchar,
     *        active => tinyint,
     * )
     */
    public function models(){
        return $this->hasMany('App\Models','id_brand');
    } 

}
