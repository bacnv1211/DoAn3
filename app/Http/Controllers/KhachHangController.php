<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class KhachHangController extends Controller
{
    //
    public function index(){
      $kh = DB::select('select * from qlkh');
      return view('Admin.KhachHang.danhsach',['kh'=>$kh]);
   }
    public function show($id) {
      $kh = DB::select('select * from qlkh where MaKH = ?',[$id]);
      return view('Admin.KhachHang.sua',['kh'=>$kh]);
   }
   public function edit(Request $request,$id) {
   	$this->validate($request,
   		[	
   			'txtten'=>'required',
   			'txtsdt'=>'required|numeric',
   			'txtemail'=>'required|email',
   			'txtdiachi'=>'required'
   		],
   		[
   			'txtten.required' => 'Bạn chưa nhập tên',
   			'txtsdt.required'=>'Bạn chưa nhập số điện thoại',
   			'txtsdt.numeric'=>'Bạn chưa nhập đúng định dạng số',  			
   			'txtemail.required'=>'Bạn chưa nhập email',
   			'txtemail.email'=>'Bạn phải nhập đúng định dạng email',
   			'txtdiachi.required'=>'Bạn chưa nhập địa chỉ'
   		]
   	);
      $ten = $request->input('txtten');
      $sdt = $request->input('txtsdt');
      $email = $request->input('txtemail');
      $diachi = $request->input('txtdiachi');
      DB::update('update qlkh set TenKH = ?,Sdt = ?,Email = ?,Diachi =? where MaKH = ?',[$ten,$sdt,$email,$diachi,$id]);
      return redirect('editKH/'.$id)->with('thongbao','Cập nhật thành công');
   }
    public function destroy($id) {
      DB::delete('delete from qlkh where MaKH = ?',[$id]);
      return redirect('/KhachHang')->with('thongbao','Xóa thành công');
   }
   public function insertform(){
      return view('Admin.KhachHang.them');
   }
	
   public function insert(Request $request){
   	$this->validate($request,
   		[	
   			'txtten'=>'required',
   			'txtsdt'=>'required|numeric',
   			'txtemail'=>'required|email|unique:qlkh,Email',
   			'txtdiachi'=>'required'
   		],
   		[
   			'txtten.required' => 'Bạn chưa nhập tên',
   			'txtsdt.required'=>'Bạn chưa nhập số điện thoại',
   			'txtsdt.numeric'=>'Bạn chưa nhập đúng định dạng số',  			
   			'txtemail.required'=>'Bạn chưa nhập email',
   			'txtemail.email'=>'Bạn phải nhập đúng định dạng email',
   			'txtemail.unique'=>'Email đã tồn tại',
   			'txtdiachi.required'=>'Bạn chưa nhập địa chỉ'
   		]
   	);
      $ten = $request->input('txtten');
      
      $sdt = $request->input('txtsdt');
  
      $email = $request->input('txtemail');
 
      $diachi = $request->input('txtdiachi');

      DB::insert('insert into qlkh (TenKH,Sdt,Email,Diachi) values(?,?,?,?)',[$ten,$sdt,$email,$diachi]);
      return redirect('insertKH')->with('thongbao','Thêm thành công');
      
  	}
  
}
