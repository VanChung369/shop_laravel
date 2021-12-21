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
                                <th scope="col">Comment</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">trạng thái</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $comments)
                            <tr>
                                <th scope="row">{{$comments ->name}}</th>
                                <td>{{$comments ->comment}}</td>
                                <td>{{$comments ->created_at}}</td>
                                <td>{{optional($comments ->Product)->name}}</td>
                                <td>
                                    @if ($comments ->status==0)
                                    {!!'Đã Duyệt'!!}
                                    @else
                                    {!!'Chưa Duyệt'!!}
                                    @endif</td>
                                <td>
                                    <a href="{{route('comment.update',['id'=>$comments->id])}}" class="btn btn-default">Duyệt</a>
                                    <a href="{{route('comment.delete',['id'=>$comments->id])}}" class="btn btn-danger">Xóa</a>
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