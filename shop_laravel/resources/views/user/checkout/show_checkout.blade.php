@extends('layouts.master')

@section('title')
<title>check out</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
{{-- <section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Thanh toán giỏ hàng</li>
			</ol>
		</div>

		<div class="register-req">
			<p>đăng ký hoặc đăng nhập để mua hàng</p>
		</div>
		<!--/register-req-->

		<div class="shopper-informations">
			<div class="row">
				<style type="text/css">
					.col-md-6.form-style input[type=text] {
						margin: 5px 0;
					}
				</style>
				<div class="col-md-12 clearfix">
					<div class="bill-to">
						<h5>Điền thông tin gửi hàng</h5>
						<h5 style="margin-left: 52%">ĐƠN HÀNG CỦA BẠN</h5>
						<div class="col-md-6 form-style">
							<form action="{{route('save-checkout')}}" method="POST">
								@csrf
								<input type="text" name="shipping_name" class="shipping_name form-control"
									placeholder="Họ và tên người gửi">
								<input type="text" name="shipping_address" class="shipping_address form-control"
									placeholder="Địa chỉ gửi hàng">
								<input type="text" name="shipping_phone" class="shipping_phone form-control"
									placeholder="Số điện thoại">
								<textarea name="shipping_notes" class="shipping_notes form-control"
									placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
								<div class="">
									<div class="form-group">
										<span>
											<label><input name="payment_option" value="1" type="radio"> Trả bằng thẻ ATM</label>
										</span>
										<span>
											<label><input name="payment_option" value="2" type="radio"> Nhận tiền mặt</label>
										</span>
									</div>
								</div>
								<input type="submit" value="Mua Hàng" name="send_order"
									class="btn btn-primary btn-sm send_order">
							</form>
						</div>
					</div>

					<div class="bill-to">
						<div class="col-md-6 form-style">
							<table class="table caption-top">
								@php
								$content = Cart::content();
								@endphp
								<thead>
									<tr>
										<th scope="col">SẢN PHẨM</th>
										<th scope="col">TẠM TÍNH</th>
									</tr>
								</thead>
								<tbody>
									@foreach ( $content as $contents )
									<tr>
										<td>{{$contents->name}}{{'x'}}{{$contents->qty}}</td>
										<td>{{number_format($contents->price).' '.'VND'}}</td>
									</tr>
									@endforeach
									<tr>
										<td>Thuế</td>
										<td>{{Cart::tax(0,',' ,'.').' '.'VND'}}</td>
									</tr>
									<tr>
										<td>Tổng</td>
										<td>{{Cart::total(0,',' ,'.').' '.'VND'}}</td>
									</tr>
								</tbody>
							</table>
							<h6>Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng,
								tăng trải nghiệm sử dụng website, và cho các mục đích cụ thể khác
								đã được mô tả trong chính sách riêng tư của chúng tôi.</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> --}}

{{--  --}}

<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<form action="{{route('save-checkout')}}" method="POST">
			@csrf
		<div class="row">
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Thông Tin</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="shipping_name" placeholder="Họ Tên">
					</div>
					<div class="form-group">
						<input class="input" type="text" name="shipping_address" placeholder="Địa Chỉ">
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="shipping_phone" placeholder="Số Điện Thoại">
					</div>
					<div class="order-notes">
						<textarea class="input" name="shipping_notes" placeholder="Ghi Chú"></textarea>
					</div>
				</div>
				<!-- Billing Details -->
			</div>
			<div class="col-md-5 order-details">
				@php
				$content = Cart::content();
				@endphp
				<div class="section-title text-center">
					<h3 class="title">Đơn Hàng</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Sản Phẩm</strong></div>
						<div><strong>Giá</strong></div>
					</div>
					@foreach ( $content as $contents )
					<div class="order-products">
						<div class="order-col">
							<div>{{$contents->qty}}{{'x'}}{{$contents->name}}</div>
							<div>{{number_format($contents->price)}}</div>
						</div>
					</div>
					@endforeach
					<div class="order-col">
						<div>Phí vận chuyển</div>
						<div><strong>FREE</strong></div>
					</div>
					<div class="order-col">
						<div><strong>TỔNG</strong></div>
						<div><strong class="order-total">{{Cart::total(0,',' ,'.')}}</strong></div>
					</div>
				</div>
				<div class="payment-method">
					<div class="input-radio">
						<input type="radio" name="payment_option" id="payment-1" value="1">
						<label for="payment-1">
							<span></span>
							Trả bằng thẻ ATM
						</label>
						<div class="caption">
							<p> Trả bằng thẻ ATM.</p>
						</div>
					</div>
					<div class="input-radio">
						<input type="radio" name="payment_option" id="payment-2" value="2">
						<label for="payment-2">
							<span></span>
							Nhận tiền mặt
						</label>
						<div class="caption">
							<p> Nhận tiền mặt.</p>
						</div>
					</div>
				</div>
				<input type="submit" value="Mua Hàng" name="send_order"class="primary-btn order-submit">
			</div>
			<!-- /Order Details -->
		</div>
		</form>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>

@endsection