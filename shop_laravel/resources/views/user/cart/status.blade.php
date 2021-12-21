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
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="id">ID</td>
						<td class="date">Ngày</td>
						<td class="status">Tình trạng</td>
						<td class="cart_total">Tổng</td>
					</tr>
				</thead>
				<tbody>
					@foreach($order as $orders)
					<tr>
						<td class="id">
						   {{$orders->id}}
						</td>
						<td class="date">
                            {{$orders->created_at}}
						</td>
						<td class="status">
                            {{$orders->status}}
						</td>
						<td class="cart_total">
							{{$orders ->total}}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection