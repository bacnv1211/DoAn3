@extends('Admin.Layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đặt lịch
                            <small>List</small>
                        </h1>
                    </div>

                    <a href="insertDL" title="Thêm"><i class="fa fa-plus  fa-fw"></i></a>
                     @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã đặt lịch</th>
                                <th>Dịch vụ</th>
                                <th>Giờ hẹn</th>
                                <th>Ngày</th>
                                <th>Mã nhân viên</th>
                                <th>Mã khách hàng</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($dl as $datlich)
                            <tr class="even gradeC" align="center">
                                <td>{{ $datlich->MaDatLich }}</td>
                                <td>{{ $datlich->TenDV }}</td>
                                <td>{{ $datlich->GioHen }}</td>
                                <td>{{ $datlich->Ngay }}</td>
                                <td>{{ $datlich->TenNV }}</td>
                                <td>{{ $datlich->TenKH }}</td>
                                <td class="center"><a href="deleteDL/{{ $datlich->MaDatLich }}" title="Xóa" OnClick="return confirm('blah blah');"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                                <td class="center"><a href="editDL/{{ $datlich->MaDatLich }}" title="Sửa"><i class="fa fa-pencil fa-fw"></i> </a></td>
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
       