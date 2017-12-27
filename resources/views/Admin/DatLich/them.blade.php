 @extends('Admin.Layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm mới
                            <small>Đặt lịch</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="createDL" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label>Dịch vụ</label>
                                <select class="form-control" name="txtdv">
                                	@foreach ($dv as $dichvu)
                                        <option value="{{ $dichvu->MaDV }}">
                                        {{ $dichvu->TenDV }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giờ hẹn</label>
                                <input class="form-control" name="txtgio" type="time" /> 
                            </div>
                            <div class="form-group">
                                 <label>Ngày</label>
                                <input class="form-control" name="txtngay"  type="date" />
                            </div>
                            <div class="form-group">
                                <label>Nhân viên</label>
                                <select class="form-control" name="txtnv">
                                    @foreach($nv as $nhanvien)
                                    <option value="{{$nhanvien->MaNV}}">
                                        {{$nhanvien->TenNV}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <select class="form-control" name="txtkh">
                                	@foreach($kh as $khachhang)
                                    <option value="{{$khachhang->MaKH}}">
                                        {{$khachhang->TenKH}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Đặt lại</button>
                            <i class="fa  fa-refresh  fa-fw"></i><a href="DatLich">Quay về danh sách</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection