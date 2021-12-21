@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('adminsl/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Order', 'key' => 'Edit'])
    <form action="{{ route('order.update',['id'=>$order->id])}}" method="post">
        <div class="content">
            <div class="container-fluid">
                <div>
                    <h4>Đặt hàng chi tiết</h4>
                    <b>Thanh toán qua
                        @if (optional($order->payment)->method==1)
                        {{ 'Trả bằng thẻ ATM' }}
                        @else
                        {{ 'Nhận tiền mặt' }}
                        @endif. ID khách hàng:{{$order->user_id}}</b>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @csrf
                        <h5>{{optional($order->customer)->name}}</h5>
                        <div class="form-group">
                            <label>Ngày Tạo</label>
                            <input type="datetime" class="form-control" name="date" value="{{ $order->created_at }}">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="status">
                                <option>{{$order->status}}</option>
                                <option value="Đang sử lý">Đang sử lý</option>
                                <option value="Tạm giữ">Tạm giữ</option>
                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-4">
                        <div>
                            <h5>Thanh toán</h5>
                            <b>Địa chỉ : </b>
                            <p>{{optional($order->customer)->address}}</p>
                            <b>Số điện thoại</b>
                            <p>{{optional($order->customer)->phone}}</p>
                            <b>Ghi chú</b>
                            <p>{{optional($order->customer)->note}}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Chi phí</th>
                            <th scope="col">số lượng</th>
                            <th scope="col">Tổng</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_item as $order_item)
                          <tr>
                              <th scope="row">{{$order_item->name}}</th>
                              <td>{{$order_item->price}}</td>
                              <td>{{$order_item->Quantity}}</td>
                              <td>{{($order_item->price)*($order_item->Quantity)}}</td>
                          </tr>
                          @endforeach
                          <tr>Tổng chi phí:{{$order->total}}</tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('adminsl/product/add/add.js') }}"></script>
@endsection