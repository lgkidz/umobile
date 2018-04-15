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

##########################################################
Route::get('/admin', 'admin_controller@check_authority');
Route::get('/admin/{path?}', 'admin_controller@check_path');
Route::post('/adminlogin', 'admin_controller@admin_login');
Route::get('/adminlogout', 'admin_controller@admin_logout');
#########################################################
Route::post('/admin/products/addproduct','admin_products_controller@addproduct');
Route::post('/admin/products/list_product','admin_products_controller@list_product');
Route::post('/admin/products/editproduct','admin_products_controller@editproduct');
Route::post('/admin/products/deleteproduct','admin_products_controller@deleteproduct');
#########################################################
Route::post('/admin/brands/list','admin_brands_controller@list');
Route::post('/admin/brands/edit','admin_brands_controller@edit');
Route::post('/admin/brands/insert','admin_brands_controller@insert');
Route::post('/admin/brands/delete','admin_brands_controller@delete');
#########################################################
Route::post('/admin/admins/list','admin_admins_controller@list');
#########################################################
Route::post('/admin/members/list','admin_members_controller@list');
Route::post('/admin/members/ban','admin_members_controller@ban');
#########################################################
Route::post('/admin/FAM/list','admin_FAM_controller@list');
Route::post('/admin/FAM/mail','admin_FAM_controller@mail');
##########################################################
Route::post('/admin/orders/list','admin_orders_controller@list');
Route::post('/admin/orders/changestatus','admin_orders_controller@changestatus');
