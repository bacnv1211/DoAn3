 @extends('Admin.Layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Lịch đặt khách hàng
                            <small><?php echo$dl[0]->TenKH; ?></small>
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
                        <form action="editDL/<?php echo $dl[0]->MaDatLich; ?>" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label>Dịch vụ</label>
                                <select class="form-control" name="txtdv">
                                	@foreach ($dv as $dichvu)
                                        @if($dichvu->MaDV==$dl[0]->MaDV)
                                            <option  
                                                value="{{ $dichvu->MaDV }}" selected="selected">
                                                {{$dichvu->TenDV}}
                                            </option>
                                         @else
                                            <option  
                                                value="{{ $dichvu->MaDV }}" >
                                                {{$dichvu->TenDV}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giờ hẹn</label>
                                <input class="form-control" name="txtgio" type="time" value = '<?php echo$dl[0]->GioHen; ?>'/> 
                            </div>
                            <div class="form-group">
                                 <label>Ngày</label>
                                <input class="form-control" name="txtngay"  type="date" value = '<?php echo$dl[0]->Ngay; ?>'/>
                            </div>
                            <div class="form-group">
                                <label>Nhân viên</label>
                                <select class="form-control" name="txtnv">
                                    @foreach($nv as $nhanvien)
                                    @if($nhanvien->MaNV==$dl[0]->MaNV)
                                    <option value="{{$nhanvien->MaNV}}" selected="selected">
                                        {{$nhanvien->TenNV}}
                                    </option>
                                    @else
                                    <option  
                                        value="{{ $nhanvien->MaNV }}" >
                                        {{$nhanvien->TenNV}}
                                    </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Khách hàng</label>
                                <select class="form-control" name="txtkh">
                                	@foreach($kh as $khachhang)
                                    @if($khachhang->MaKH==$dl[0]->MaKH)
                                    <option value="{{$khachhang->MaKH}}" selected="selected">
                                        {{$khachhang->TenKH}}
                                    </option>
                                    @else
                                    <option  
                                        value="{{ $khachhang->MaKH}}" >
                                        {{$khachhang->TenKH}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
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