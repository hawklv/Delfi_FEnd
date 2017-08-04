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

Route::get('/', function () {
    return view('welcome');
});

/* Other data :: login/reg etc.. */

/*Login */ 
Route::get('login', ['uses'=>'MainController@showLogin']);
Route::post('login', ['uses'=>'MainController@login']);
/*Workspace */
Route::get('workspace', ['uses'=>'WScontroller@index']);
Route::post('workspace/addClient', ['uses'=>'WScontroller@addClient']);
Route::post('workspace/deleteClient', ['uses'=>'WScontroller@deleteClient']);
Route::post('workspace/editClient', ['uses'=>'WScontroller@editClient']);

Route::post('workspace/addOrder', ['uses'=>'WScontroller@addOrder']);
Route::post('workspace/deleteOrder', ['uses'=>'WScontroller@deleteOrder']);
Route::post('workspace/editOrder', ['uses'=>'WScontroller@editOrder']);

/*Logout */
Route::get('logout', ['uses'=>'MainController@logout']);

//Route::get('login','uses'=>'MainController@login_page');
