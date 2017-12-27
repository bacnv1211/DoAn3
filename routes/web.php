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
//KhachHang
Route::get('KhachHang','KhachHangController@index');
Route::get('editKH/{MaKH}','KhachHangController@show');
Route::post('editKH/{MaKH}','KhachHangController@edit');
Route::get('deleteKH/{MaKH}','KhachHangController@destroy');
Route::get('insertKH','KhachHangController@insertform');
Route::post('createKH','KhachHangController@insert');
//DatLich
Route::get('DatLich','DatLichController@index');
Route::get('insertDL','DatLichController@insertform');
Route::post('createDL','DatLichController@insert');
Route::get('editDL/{MaDatLich}','DatLichController@show');
Route::post('editDL/{MaDatLich}','DatLichController@edit');
Route::get('deleteDL/{MaDatLich}','DatLichController@destroy');
//Dichvu
Route::get('DichVu','DichVuController@index');

//Nhanvien
Route::get('NhanVien','NhanVienController@index');
//Admin
Route::get('DangNhap','AdminController@getdangnhapAdmin');
Route::post('DangNhap','AdminController@postdangnhapAdmin');
//Tour
Route::get('Tour','TourController@index');
Route::get('TourID/{MaTour}','TourController@updateTT');
Route::get('TourID2/{MaTour}','TourController@updatett2');
//Trangchu
Route::get('Trangchu',function()
	{
		return view('User.pages.trangchu');
	});

