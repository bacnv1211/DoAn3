 @extends('Admin.Layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small><?php echo$kh[0]->TenKH; ?></small>
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
                        <form action = "editKH/<?php echo $kh[0]->MaKH; ?>" method = "post" method="POST">
                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtten" value = '<?php echo$kh[0]->TenKH; ?>' placeholder="Nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="txtsdt" value = '<?php echo$kh[0]->Sdt; ?>' placeholder="Nhập số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="txtemail" value = '<?php echo$kh[0]->Email; ?>' placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="txtdiachi" value = '<?php echo$kh[0]->Diachi; ?>' placeholder="Nhập địa chỉ" />
                            </div>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Đặt lại</button>
                            <i class="fa  fa-refresh  fa-fw"></i><a href="KhachHang">Quay về danh sách</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
            @endsection