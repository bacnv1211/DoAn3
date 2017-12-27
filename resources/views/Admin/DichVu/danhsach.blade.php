@extends('Admin.Layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dịch vụ
                            <small>List</small>
                        </h1>
                    </div>
                    <i class="fa fa-plus  fa-fw"></i><a href="insert">Insert</a>
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                 {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã dịch vụ</th>
                                <th>Tên dịch vụ</th>
                                <th>Giá</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($dv as $dichvu)
                            <tr class="even gradeC" align="center">
                                <td>{{ $dichvu->MaDV }}</td>
                                <td>{{ $dichvu->TenDV }}</td>
                                <td>{{ $dichvu->Gia }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="delete/{{ $dichvu->MaDV }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="edit/{{ $dichvu->MaDV }}">Edit</a></td>
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
