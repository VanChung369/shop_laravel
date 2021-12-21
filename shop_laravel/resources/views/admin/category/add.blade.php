
@extends('layouts.admin')

@section('title')
 <title>Trang chủ</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @include('partials/content-header',['name'=>'category', 'key'=>'Add'])
    <!-- /.content-header -->
    <div class="col-md-6">
    <form action="{{route('category.store')}}" method="post">
      @csrf {{--tạo mã token tự động--}}
  <div class="form-group">
    <label for="name" class="form-label">Tên Định Danh</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
  </div>
  <div class="form-group">
  <label>Danh mục cha </label>
  <select class="form-control" name="parent_id">
  <option value="0">Chọn danh mục cha</option>
   {!!$htmloption!!}  {{-- !! printf su dung ki du lieu la string  {{echo}}--}}
   </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </div><!-- /.container-fluid -->
@endsection
