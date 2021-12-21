@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials/content-header',['name'=>'Menu', 'key'=>'']) {{-- truyền 1 mang vào trong phần content-header
    để lấy dữ liệu name và key--}}
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"><a href="{{route('menu.create')}}" class="btn btn-success m-2">Thêm</a></div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $item)
                            <tr>
                                <th scope="row">{{$item ->id}}</th>
                                <td>{{$item ->name}}</td>
                                <td>
                                    <a href="{{route('menu.edit',['id'=>$item->id])}}"
                                        class="btn btn-default">Sửa</a>
                                    <a href="{{route('menu.delete',['id'=>$item->id])}}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <div class="rol">
                <div class="col-sm-3">
                    {{ $menus->onEachSide(5)->links() }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection