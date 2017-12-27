@extends('Admin.Layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhân viên
                            <small>List</small>
                        </h1>
                    </div>
                    <a href="insert" ><i class="fa fa-plus  fa-fw" ></i></a>
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th>Tên </th>
                                <th>Ngày sinh</th>
                                <th>Ảnh</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Hoa hồng</th>
                                <th>Tình trạng</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($nv as $nhanvien)
                            <tr class="even gradeC" align="center">
                                <td>{{ $nhanvien->MaNV }}</td>
                                <td>{{ $nhanvien->TenNV }}</td>
                                <td>
                                    {{ $nhanvien->NgaySinh }}
                                </td>
                                <td>
                               	<img width="50px" src="Asset/anh/{{ $nhanvien->Anh }}" /> 
                               	</td>
                                <td>{{ $nhanvien->SDT }}</td>
                                <td>{{ $nhanvien->Email }}</td>
                                <td>{{ $nhanvien->DiaChi }}</td>
                                <td>@if($nhanvien->GioiTinh ==1)
                                		{{
                                			'Nam'
                                		}}
                                	@else
                                		{{
                                			'Nữ'
                                		}}
                                	@endif
                            	</td>
                                <td>{{ $nhanvien->TiLeHoaHong }}%</td>
                                <td>
                                	@if($nhanvien->TinhTrang ==1)
                                		{{
                                			'Đang làm'
                                		}}
                                	@else
                                		{{
                                			'Rảnh'
                                		}}
                                	@endif
                                </td>
                                <td class="center"><a href="delete/{{ $nhanvien->MaNV }}"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
                                <td class="center"><a href="edit/{{ $nhanvien->MaNV }}"><i class="fa fa-pencil fa-fw"></i></a></td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection

