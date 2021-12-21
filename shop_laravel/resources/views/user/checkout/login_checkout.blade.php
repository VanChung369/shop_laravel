@extends('layouts.master')
@section('title')
<title>login</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				 <form role="form" action="{{route('add-customer')}}" method="POST">
					@csrf
					<fieldset>							
						<p class="text-uppercase pull-center">Đăng kí</p>	
						 <div class="form-group">
							<input type="text" name="customer_name" id="username" class="form-control input-lg" placeholder="Họ và tên">
						</div>

						<div class="form-group">
							<input type="email" name="customer_email" id="email" class="form-control input-lg" placeholder="Địa chỉ email">
						</div>
						<div class="form-group">
							<input type="password" name="customer_password" id="password" class="form-control input-lg" placeholder="Password">
						</div>
						 <div>
							<input type="submit" class="btn btn-lg btn-primary" value="Đăng Kí">
						 </div>
					</fieldset>
				</form>
			</div>
			
			<div class="col-md-2">
				<!-------null------>
			</div>
			
			<div class="col-md-5">
					  <form role="form" action="{{route('login-customer')}}" method="POST">
						@csrf
					<fieldset>							
						<p class="text-uppercase"> Đăng Nhập </p>	
							 
						<div class="form-group">
							<input type="email" name="email" id="username" class="form-control input-lg" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
						</div>
						<div class="form-check">
							<label class="form-check-label">
							  <input type="checkbox" class="form-check-input" name="remember">
							  Ghi nhớ đăng nhập
							</label>
						  </div>
						<div>
							<input type="submit" class="btn btn-md  btn-primary" value="Đăng Nhập">
						</div>
							 
					 </fieldset>
			</form>	
			</div>
		</div>
	</div>
</div>
@endsection