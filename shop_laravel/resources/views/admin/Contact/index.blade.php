@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials/content-header',['name'=>'comment', 'key'=>''])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Khu vực</th>
                                <th scope="col">Tin nhắn</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $contacts)
                            <tr>
                                <th scope="row">{{$contacts ->name}}</th>
                                <td>{{$contacts ->email}}</td>
                                <td>{{$contacts ->Country}}</td>
                                <td>{{$contacts->message}}</td>
                                <td>
                                    <a href="{{route('contact.delete',['id'=>$contacts->id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="rol">
                <div class="col-sm-3"></div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection