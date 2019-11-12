<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
class Install extends Model
{
    public function install(){
        if(!Schema::hasTable('brand_clone')){
            Schema::create('brand_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('active');
                $table->integer('id_employee');
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('county_clone')){
            Schema::create('county_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });
        }
        if(!Schema::hasTable('image_clone')){
            Schema::create('image_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_item');
                $table->string('name');
                $table->integer('cover');
                $table->string('base64');
                $table->string('size');
                $table->string('url');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('item_clone')){
            Schema::create('item_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_user');
                $table->integer('id_county');
                $table->string('title');
                $table->float('price');
                $table->float('cost');
                $table->string('description');
                $table->integer('id_brand');
                $table->integer('id_model');
                $table->integer('year');
                $table->string('km_range');
                $table->enum('type',['Tay Côn/Moto', 'xe sô', 'Tay ga']);
                $table->string('name');
                $table->string('phone');
                $table->string('link');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('model_clone')){
            Schema::create('model_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('id_brand');
                $table->integer('active');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('payment_clone')){
            Schema::create('payment_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_user');
                $table->float('amount');
                $table->float('bonus');
                $table->integer('id_payer');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('role_clone')){
            Schema::create('role_clone', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->string('phone');
                $table->string('facebook_name');
                $table->string('facebook_url');
                $table->string('bank_name');
                $table->string('bank_branch');
                $table->string('beneficiary_account');
                $table->string('beneficiary_name');
                $table->float('threshold');
                $table->float('price');
                $table->integer('id_role');
                $table->timestamps();
            });
        }
    }

}
