<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DichVuController;
class DatLichController extends Controller
{
     public function index(){
      $dl = DB::select('SELECT qldatlich.*,qlkh.TenKH,qlnv.TenNV,qldv.TenDV from qldatlich inner JOIN qlkh on qlkh.MaKH=qldatlich.MaKH inner join qldv on qldv.MaDV=qldatlich.MaDV INNER JOIN qlnv on qlnv.MaNV=qldatlich.MaNV');
      return view('Admin.DatLich.danhsach',['dl'=>$dl]);
   }
    public function insertform(){
    	$dv = DB::select('select * from qldv');
    	$nv = DB::select('select * from qlnv');
      $kh = DB::select('select * from qlkh');
      return view('Admin.DatLich.them',['dv'=>$dv,'nv'=>$nv,'kh'=>$kh]);
   }
	
   public function insert(Request $request){
   	$this->validate($request,
   		[	
   			'txtgio'=>'required',
   			'txtngay'=>'required'
   		],
   		[
   			'txtgio.required' => 'Bạn chưa nhập giờ',   				
   			'txtngay.required'=>'Bạn chưa nhập ngày'
   	
   		]
   	);
      $dv = $request->input('txtdv');      
      $gio = $request->input('txtgio');  
      $ngay = $request->input('txtngay'); 
      $nv = $request->input('txtnv');
      $kh = $request->input('txtkh');

      DB::insert('insert into qldatlich (MaDV,GioHen,Ngay,MaNV,MaKH) values(?,?,?,?,?)',[$dv,$gio,$ngay,$nv,$kh]);
      return redirect('insertDL')->with('thongbao','Thêm thành công');
      
  	}

    public function show($id) {
      $dv = DB::select('select * from qldv');
      $nv = DB::select('select * from qlnv');
      $kh = DB::select('select * from qlkh');
      $dl = DB::select('SELECT qldatlich.MaDV,qldatlich.MaNV,qldatlich.MaKH,qldatlich.MaDatLich,qldatlich.GioHen,qldatlich.Ngay,qlkh.TenKH,qlnv.TenNV,qldv.TenDV from qldatlich inner JOIN qlkh on qlkh.MaKH=qldatlich.MaKH inner join qldv on qldv.MaDV=qldatlich.MaDV INNER JOIN qlnv on qlnv.MaNV=qldatlich.MaNV where MaDatLich = ?',[$id]);
      return view('Admin.DatLich.sua',['dl'=>$dl,'dv'=>$dv,'nv'=>$nv,'kh'=>$kh,'id'=>$id]);
   }
   public function edit(Request $request,$id) {
    $this->validate($request,
      [ 
        'txtgio'=>'required',
        'txtngay'=>'required'
      ],
      [
        'txtgio.required' => 'Bạn chưa nhập giờ',          
        'txtngay.required'=>'Bạn chưa nhập ngày'    
      ]
    );
      $dv = $request->input('txtdv');
      $gio = $request->input('txtgio');
      $ngay = $request->input('txtngay');
      $nv = $request->input('txtnv');
      $kh = $request->input('txtkh');
      DB::update('update qldatlich set MaDV = ?,GioHen = ?,Ngay = ?,MaNV=?,MaKH =? where MaDatLich = ?',[$dv,$gio,$ngay,$nv,$kh,$id]);
      return redirect('editDL/'.$id)->with('thongbao','Cập nhật thành công');
   }
    public function destroy($id) {
      DB::delete('delete from qldatlich where MaDatLich = ?',[$id]);
      return redirect('DatLich')->with('thongbao','Xóa thành công');
   }
}
