@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('adminsl/slider/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminsl/main.js') }}"></script>
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-success m-2"> Thêm</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Phương thức</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($slider as $item)

                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img class="image_slider_150_100" src="{{ $item->image_path }}" alt="">

                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', ['id' => $item->id]) }}"
                                        class="btn btn-default">Sửa</a>
                                    <a href="" data-url="{{ route('slider.delete', ['id' => $item->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $slider->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>

</div>

@endsection