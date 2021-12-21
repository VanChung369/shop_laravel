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
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 style="color: red" class="titler">Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</h2>
                    <ul>
						<li>Ngày: {{date('Y-m-d')}}</li>
						<li>Phương thức thanh toán: 
                            @if ($payment==1)
							{{ 'Trả bằng thẻ ATM' }}
							@else
							{{ 'Nhận tiền mặt' }}
							@endif
						</li>
                    </ul>
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection