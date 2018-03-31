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
Route::get('/admin/{path?}', 'admin_controller@check_path');
Route::post('/adminlogin', 'admin_controller@admin_login');
Route::get('/adminlogout', 'admin_controller@admin_logout');
Route::post('/admin/products/addproduct','admin_products_controller@addproduct');
Route::post('/admin/products/list_product','admin_products_controller@list_product');
Route::post('/admin/products/editproduct','admin_products_controller@editproduct');
Route::post('/admin/products/deleteproduct','admin_products_controller@deleteproduct');
