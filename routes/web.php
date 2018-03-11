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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'admin_controller@check_authority');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::post('/adminlogin', 'admin_controller@admin_login');
Route::get('/adminlogout', 'admin_controller@admin_logout');
