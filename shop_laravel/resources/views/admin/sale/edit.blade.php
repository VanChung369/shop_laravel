@extends('layouts.admin')

@section('title')
<title>Add sale</title>
@endsection
@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('adminsl/product/add/add.css') }}" rel="stylesheet" />
@endsection
@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'sale', 'key' => 'edit'])
    <div class="col-md-12">
    </div>
    <form action="{{ route('sale.update', ['id' => $Sale->id]) }}" method="post">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên chương trình</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Nhập tên chương trình" value="{{ $Sale->name }}">
                        </div>
                        <div class="form-group">
                            <label>Mức giảm</label>
                            <input type="text" class="form-control" name="discount"
                                placeholder="Nhập giá mức giảm giá" value="{{ $Sale->discount }}" >
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="text" class="form-control" name="number_product"
                                placeholder="Nhập số lượng"  value="{{ $Sale->number_product }}">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục giảm giá</label>
                            <select class="form-control select2_init"
                                name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>	Thời gian bắt đầu</label>
                            <input type="datetime-local" class="form-control" name="start" value="{{$Sale->start}}">
                        </div>

                        <div class="form-group">
                            <label>Thời gian kết thúc</label>
                            <input type="datetime-local" class="form-control mb-2"
                                name="end" value="{{$Sale->end}}">
                            <div class="row image_detail_wrapper">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
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