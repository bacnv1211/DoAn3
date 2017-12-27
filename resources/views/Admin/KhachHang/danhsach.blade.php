@extends('Admin.Layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                      
                    <a href="insertKH" title="Thêm"><i class="fa fa-plus  fa-fw"></i></a>
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã kh</th>
                                <th>Tên kh</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($kh as $khachhang)
                            <tr class="even gradeC" align="center">
                                <td>{{ $khachhang->MaKH }}</td>
                                <td>{{ $khachhang->TenKH }}</td>
                                <td>{{ $khachhang->Sdt }}</td>
                                <td>{{ $khachhang->Email }}</td>
                                <td>{{ $khachhang->Diachi }}</td>
                                <td class="center"><a href="deleteKH/{{ $khachhang->MaKH }}" title="Xóa"> <i class="fa fa-trash-o  fa-fw"></i></a></td>
                                <td class="center"> <a href="editKH/{{ $khachhang->MaKH }}" title="Sửa"><i class="fa fa-pencil fa-fw"></i></a></td>
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