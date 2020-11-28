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
// Route::get ('/', function(){
//     return view('admin.login');
// })->name('home');

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
Route::get('/','Authcontroller@viewLogin')->name('login-admin');
Route::post('/handle-login-admin','Authcontroller@xuLyDangNhap')->name('handle-login-admin');
Route::get('/logout','Authcontroller@logout')->name('logout');

//Giao diện khách hàng
Route::get('/home-client', 'TrangChuController@index')->name('home-client');
Route::get('/detail-product-client/{id}','TrangChuController@show')->name('detail-product-client');
//Giỏ hàng
Route::get('/cart','TrangChuController@cart')->name('cart');
Route::get('/add-to-cart/{idProduct}','TrangChuController@addtoCart')->name('add-to-cart');
Route::get('/clear-cart','TrangChuController@clearCart')->name('clear-cart');
Route::get('/clear-one-product/{idProduct}','TrangChuController@clearOneProduct')->name('clear-one-product');
Route::post('/add-more-product/{idProduct}','TrangChuController@addMoreProductToCart')->name('add-more-product');

Route::get('/get-product-in-category/{idCategory}','TrangChuController@getProduct')->name('get-product-in-category');

//Đăng nhập, Đăng ký, Đăng xuất khách hàng
Route::get('/register-client','KhachHangController@viewRegister')->name('register-client');
Route::post('/handle-register-client','KhachHangController@xuLyDangKy')->name('handle-register-client');
Route::get('/login-client','KhachHangController@viewLogin')->name('login-client');
Route::post('/handle-login-client','KhachHangController@xuLyDangNhap')->name('handle-login-client');
Route::get('/logout-client','KhachHangController@logout')->name('logout-client');

Route::get('/thanh-toan','KhachHangController@payment')->name('thanh-toan');
Route::post('/dat-hang','KhachHangController@datHang')->name('dat-hang');
Route::post('/capnhat-soluong','KhachHangController@updateSoLuong')->name('capnhat-soluong');
Route::get('/donhang-kh/{idCus}','KhachHangController@donHang')->name('donhang-kh');

//Quản lý đơn hàng
Route::get('/don-hang','DonHangController@donHang')->name('don-hang');
Route::get('/chi-tiet-don/{idDonHang}','DonHangController@chiTietDonHang')->name('chi-tiet-don');
Route::get('/cap-nhat-trang-thai/{idDonHang}','DonHangController@capNhatTrangThai')->name('cap-nhat-trang-thai');
