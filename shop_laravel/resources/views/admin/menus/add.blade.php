@extends('layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partials/content-header',['name'=>'Menu', 'key'=>'Add'])
  <!-- /.content-header -->
  <div class="col-md-6">
    <form action="{{route('menu.store')}}" method="post">
      @csrf {{--tạo mã token tự động--}}
      <div class="form-group">
        <label for="name" class="form-label">Tên Menu</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
      </div>
      <div class="form-group">
        <label>Menu cha </label>
        <select class="form-control" name="parent_id">
          <option value="0">Chọn Menu cha</option>
          {{!!$optionselected!!}}
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div><!-- /.container-fluid -->
@endsection