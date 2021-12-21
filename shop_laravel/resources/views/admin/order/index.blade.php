@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials/content-header',['name'=>'Order', 'key'=>''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Người đặt</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">TÌnh Trạng</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $orders)
                                <tr>
                                    <th scope="row">{{optional($orders->customer)->name}}</th>
                                    <td>{{$orders ->total}}</td>
                                    <td>{{$orders->status}}</td>
                                    <td>
                                        <a href="{{route('order.edit',['id'=>$orders->id])}}"
                                            class="btn btn-default">xem</a>
                                        <a href="{{route('order.delete',['id'=>$orders->id])}}"
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
                    {{ $order->onEachSide(5)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection