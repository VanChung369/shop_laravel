@extends('layouts.master')

@section('title')
<title>Tìm Kiếm Sản Phẩm</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection
@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection
@section('content')
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Trang chủ</a></li>
                        <li class="active">Tìm Kiếm</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
              @include('components/sidebar')
                <!-- /ASIDE -->
                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>
    
                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->
    
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @foreach($search_product as $product)
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{$product->feature_image_path}}" alt="">
                                    <div class="product-label">
                                        @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now()&& $sale_product->sale->category_id == $product->category_id && $sale_product->number_product>0)
                                        <span class="sale">{{$sale_product->discount}}%</span>
                                        @else
                                        @endif
                                        {{-- <span class="new">NEW</span> --}}
                                    </div>
                                </div>
                                <div class="product-body" style="height: 263px">
                                    <p class="product-category">{{$product->category->name}}</p>
                                    <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                    @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now()&& $sale_product->sale->category_id == $product->category_id && $sale_product->number_product>0)
                                    <h4 class="product-price">{{number_format($product->price-($product->price*($sale_product->discount/100)))}} <del class="product-old-price">{{number_format($product->price)}}</del></h4>
                                    @else
                                    <h4 class="product-price">{{number_format($product->price)}} </h4>
                                    @endif
                                    @php
                                    $star=0;
                                    $i=0;
                                        foreach ($product->comment as $value) {
                                           $star += $value->star;
                                           $i++; 
                                        }
                                        if ($i==0) {
                                            $avgstar= number_format($star,0,'.');
                                        }
                                        else {
                                            $avgstar= number_format($star/$i,0,'.');
                                        }
                                    @endphp
                                    <div class="product-rating">
                                        @for ($i=1;$i<=5;$i++)
                                        @if ($i <= number_format($avgstar ,0, '.', ''))
                                        <i class="fa fa-star"></i>
                                        @else
                                        <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                    </div>
                                    <div class="product-btns">
                                        <button class="quick-view"> <a href="{{route('UserProduct.index', ['slug'=>$product->category->slug,'id' => $product->id ])}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <form action="{{route('save-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="hidden" name="product_id" value="{{$product->id}}" />
                                        @if ($product->Quantity <= 1) <button type="submit"
                                            class="btn add-to-cart-btn disabled">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm Vào Giỏ
                                            </button>
                                            @elseif ($product->Quantity > 1)
                                            <button type="submit" class="btn add-to-cart-btn">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm Vào Giỏ
                                            </button>
                                            @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- /product -->
                    </div>
                    <!-- /store products -->
    
                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    @endsection