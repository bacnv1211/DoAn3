<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
	public function getdangnhapAdmin()
	{
		return view('Admin.Login.login');
	}
	public function postdangnhapAdmin(Request $request)
	{
		$this->validate($request,
   		[	
   			'txtname'=>'required',
   			'txtpassword'=>'required|min:3|max:32'
   		],
   		[
   			'txtname.required' => 'Bạn chưa tên đăng nhập', 				
   			'txtpassword.required'=>'Bạn chưa nhập mật khẩu',
   			'txtpassword.min'=>'Mật khẩu không được nhỏ hơn 3 ký tự',
   			'txtpassword.max'=>'Mật khẩu không được lớn hơn 32 ký tự' 	
   		]
   	);
      if(Auth::attempt(['txtname'=>$request->User,'txtpassword'=>$request->Pass]))
      	{
      		return redirect('KhachHang'); 
      	}
      	else
      	{
      		return redirect('login')->with('thongbao','Đăng nhập không thành công'); 	
      	}
	}
}
