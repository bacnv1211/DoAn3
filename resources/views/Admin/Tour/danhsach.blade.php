@extends('Admin.Layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tour
                            <small>Danh sách</small>
                        </h1>
                    </div>
                      
                    <a href="insertKH" title="Thêm"><i class="fa fa-plus  fa-fw"></i></a>
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                    <div style="width: 100%;height: 100%">
                        <div style="width: 49%;height: 100%;float: left;">
                            <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Nhân viên</th>
                                <th>Giờ đến</th>
                                <th>Hẹn</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($tour as $tourmot)
                            <tr class="even gradeC" align="center">
                                <td>{{ $tourmot->STT }}</td>
                                <td>
                                <a onclick="return confirm('blah blah');" href="TourID/{{ $tourmot->MaTour }}"><img width="50px" src="Asset/anh/{{ $tourmot->Anh }}" /></a>
                                <br>
                                <small>{{ $tourmot->TenNV }}</small>
                                </td>
                                <td>{{ $tourmot->GioDen }}</td>
                                <td>{{ $tourmot->Hen }}</td>
                                <td>
                                    @if($tourmot->TinhTrang ==0)
                                    {{
                                        'Đã nghỉ'
                                    }}
                                    @else
                                    {{
                                        'Đang làm'
                                    }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                        </div>
                        <div style="width: 49%;height: 100%;float: right;">
                            <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Nhân viên</th>
                                <th>Giờ đến</th>
                                <th>Hẹn</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($tour1 as $tourhai)
                            <tr class="even gradeC" align="center">

                                <td>{{ $tourhai->STT }}</td>
                                <td>
                                <a href="TourID2/{{ $tourhai->MaTour }}"><img width="50px" src="Asset/anh/{{ $tourhai->Anh }}" /></a>
                                <br>
                                <small>{{ $tourhai->TenNV }}</small>
                                </td>
                                <td>{{ $tourhai->GioDen }}</td>
                                <td>{{ $tourhai->Hen }}</td>
                                <td>
                                    @if($tourhai->TinhTrang ==0)
                                    {{
                                        'Đã nghỉ'
                                    }}
                                    @else
                                    {{
                                        'Đang làm'
                                    }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection