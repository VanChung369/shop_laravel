@extends('layouts.master')

@section('title')
<title>chi tiết sản phẩm</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Giỏ hàng của bạn</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			@php
			$content = Cart::content();
			@endphp
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sp</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $contents)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{$contents->options->image}}" width="90" alt="" /></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$contents->name}}</a></h4>
							<p>ID: {{$contents->id}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($contents->price).' '.'VND'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{route('update-cart-quantity')}}" method="POST">
									@csrf
									<input class="cart_quantity_input" type="text" name="cart_quantity"
										value="{{$contents->qty}}">
									<input type="hidden" value="{{$contents->rowId}}" name="rowId_cart"
										class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty"
										class="btn btn-default btn-sm">
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								@php
								$subtotal = $contents->price * $contents->qty;
								echo number_format($subtotal).' '.'VND';
								@endphp

							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete"href="{{route('delete-to-cart',['id'=>$contents->rowId])}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="total_area">
					<table class="table table-hover">
					<tbody>
						<tr>
							<td>Tổng</td>
							<td >{{Cart::total(0,',' ,'.').' '.'VND'}}</td>
						</tr>
						<tr>
							<td>Thuế</td>
							<td>{{Cart::tax(0,',' ,'.').' '.'VND'}}</td>
						</tr>
						<tr>
							<td>Phí vận chuyển</td>
							<td>Free</td>
						</tr>
						<tr>
							<td>Thành tiền </td>
							<td>{{Cart::total(0,',' ,'.').' '.'VND'}}</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							@if ((Session::get('adduser')!=Null))
						<td colspan="2"><a class="btn btn-default check_out"  href="{{route('checkout')}}"> Checkout</a></td>
							@else
						<td colspan="2"><a class="btn btn-default check_out"  href="{{route('login-checkout')}}"> Checkout</a></td>
							@endif
						</tr>
					</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#do_action-->


@endsection