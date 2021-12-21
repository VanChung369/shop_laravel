@extends('layouts.admin')

@section('title')
<title>Sale</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('adminsl/product/index/list.css') }}">
@endsection
@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminsl/main.js') }}"></script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'sale', 'key' => ''])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('sale.create') }}" class="btn btn-success m-2">Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Chương Trình</th>
                                <th scope="col">Mức giảm(theo %)</th>
                                <th scope="col">số Lượng</th>
                                <th scope="col">Thời gian bắt đầu</th>
                                <th scope="col">Thời gian kết thúc</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($sale_product as $sale_products)
                        
                            <tr>
                                <th scope="row">{{ $sale_products->id }}</th>
                                <td>{{ $sale_products->name }}</td>
                                <td>{{ $sale_products->discount}}</td>
                                <td>{{ $sale_products->number_product}}</td>
                                <td>{{ $sale_products->date_start}}</td>
                                <td>{{ $sale_products->date_end}}</td>
                                <td>
                                    <a href="{{ route('sale.edit', ['id' => $sale_products->sale_id]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href="{{ route('sale.delete', ['id' => $sale_products->sale_id]) }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection