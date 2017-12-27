<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index(){
	  $tour = DB::select('select qltour.*,qlnv.TenNV,qlnv.Anh from qltour INNER JOIN qlnv on qlnv.MaNV=qltour.MaNV where qltour.TinhTrang = 0');
	  $tour1 = DB::select('select qltour.*,qlnv.TenNV,qlnv.Anh from qltour INNER JOIN qlnv on qlnv.MaNV=qltour.MaNV where qltour.TinhTrang = 1');
	  return view('Admin.Tour.danhsach',['tour'=>$tour,'tour1'=>$tour1]);
   	}
   	public function updateTT(Request $request,$id)
   	{
   		DB::update('update qltour set TinhTrang = 1 where MaTour = ?',[$id]);
      return redirect('Tour')->with('thongbao','Cập nhật thành công');
   	}
   	public function updatett2(Request $request,$id)
   	{
   		DB::update('update qltour set TinhTrang =0 where MaTour=?',[$id]);
   		return redirect('Tour')->with('thongbao','Cập nhật thành công');
   	}
   	public function getmax()
   	{
   		
   	}
}
