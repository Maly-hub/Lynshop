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
Route::get ('/', function(){
    return view('admin.index');
})->name('home');

Route::group(['middleware' => ['checkNhanVien']], function(){
    Route::group(['prefix' => 'category-list'], function(){
        // Loại Sản Phẩm
        Route::get('/category-list','LoaiSanPhamController@index')->name('category-list');
        Route::post('/add-product-type','LoaiSanPhamController@store')->name('add-product-type');
        Route::get('/repair-type/{id}','LoaiSanPhamController@edit')->name('repair-type');
        Route::post('/handle-repair-type/{id}','LoaiSanPhamController@update')->name('handle-repair-type');
        Route::get('/delete-type/{id}','LoaiSanPhamController@destroy')->name('delete-type');
        Route::get('/search-type','LoaiSanPhamController@timKiem')->name('search-type');
    });
    Route::group(['prefix' => 'product'], function(){
        // Sản Phẩm
        Route::get('/product', 'SanPhamController@index')->name('product');
        Route::post('/handle-add-product','SanPhamController@store')->name('handle-add-product');
        Route::get('/edit-product/{id}','SanPhamController@edit')->name('edit-product');
        Route::post('/handle-edit-product/{id}','SanPhamController@update')->name('handle-edit-product');
        Route::get('/delete-product/{id}','SanPhamController@destroy')->name('delete-product');
        Route::get('/detail-product/{id}','SanPhamController@show')->name('detail-product');
    });
});

//Đăng nhập, Đăng ký, Đăng xuất
Route::get('/register','Authcontroller@viewRegister')->name('register');
Route::post('/handle-register','Authcontroller@xuLyDangKy')->name('handle-register');
Route::get('/login-admin','Authcontroller@viewLogin')->name('login-admin');
Route::post('/handle-login-admin','Authcontroller@xuLyDangNhap')->name('handle-login-admin');
Route::get('/logout','Authcontroller@logout')->name('logout');

Route::get('/home-client', function(){
    return view('client.index');
})->name('/home-client');
