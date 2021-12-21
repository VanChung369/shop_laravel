@extends('layouts.admin')

@section('title')
<title>product</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminsl/product/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminsl/main.js') }}"></script>
@endsection
@section('header')
@include('partials.header-product')
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'product', 'key' => ''])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($products as $productItem)
                        
                            <tr>
                                <th scope="row">{{ $productItem->id }}</th>
                                <td>{{ $productItem->name }}</td>
                                <td>{{ number_format($productItem->price) }}</td>
                                <td>{{ $productItem->Quantity}}</td>
                                <td>
                                    <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}"
                                        alt="">
                                </td>
                                <td>{{ optional($productItem->category)->name }}</td>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $productItem->id]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href="{{ route('product.delete', ['id' => $productItem->id]) }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $products->appends($_GET)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection