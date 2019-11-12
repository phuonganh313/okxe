<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('index',function(){
    return view('admin.index');
});

Route::get('/',function(){
    return Auth::check() ? redirect('/item/list') : view('auth.login');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/report',['as'=>'admin.report.user','uses'=>'AdminController@reportUser']);

    Route::get('/admin/user/add',['as'=>'admin.add.user','uses'=>'AdminController@addUser']);

    Route::post('/admin/user/add', ['as' => 'admin.user.create','uses'=>'AdminController@saveUser']);

    Route::get('/admin/user/list',['as'=>'admin.list.user','uses'=>'AdminController@index']);

    Route::post('/admin/getaccountlist', ['as' => 'user.accounts.getlist', 'uses' => 'AdminController@getList']);

    Route::get('/admin/item/list',['as'=>'admin.list.user','uses'=>'ItemController@index']);

    Route::post('/admin/getitemlist', ['as' => 'user.list.item', 'uses' => 'ItemController@getList']);

    Route::post('/status', ['as' => 'user.status.item', 'uses' => 'ItemController@changeStatus']);

    Route::get('/admin/list/payment', ['as' => 'admin.list.payment', 'uses' => 'AdminController@listPayment']);

    Route::get('/admin/add/payment', ['as' => 'admin.add.payment', 'uses' => 'AdminController@addPayment']);

    Route::post('/admin/save/payment', ['as' => 'admin.save.payment', 'uses' => 'AdminController@save']);

});

Route::delete('/delete',['as'=>'user.item.delete','uses'=>'ItemController@deleteItem']);

Route::get('/admin/user/detail/{id}',['as'=>'admin.user.detail','uses'=>'AdminController@getDetailUser']);

Route::get('/admin/install',['as'=>'admin.install.table','uses'=>'AdminController@install']);



Route::get('/item/add',['as'=>'user.item.add','uses'=>'ItemController@showForm']);

Route::post('/item/add',['as'=>'user.item.add','uses'=>'ItemController@save']);

Route::post('/item/upload',['as'=>'user.item.upload','uses'=>'ItemController@upload']);

Route::get('/item/list',['as'=>'user.item.list','uses'=>'ItemController@listItem']);

Route::post('/user/item/list',['as'=>'user.list.item','uses'=>'ItemController@getListItem']);

Route::post('/item/model',['as'=>'user.item.model','uses'=>'ItemController@getModel']);

Route::get('test', function(){
    die(time());
});