<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('vehicles', 'VehicleController');
Route::get('/' , function () {
    return redirect()->action('VehicleController@index');
});
// Route::get('/', function () {
//     return view('home');
// });
