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
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						@foreach($product_category->productImages as $producImageItem)
						<div class="product-preview">
							<img src="{{ $producImageItem->image_path }}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						@foreach($product_category->productImages as $producImageItem)
						<div class="product-preview">
							<img src="{{ $producImageItem->image_path }}" alt="">
						</div>
						@endforeach
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
			@foreach ($products as $products )
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name">{{$products->name}}</h2>
						<div>
							<div class="product-rating">
							@for ($i=1;$i<=5;$i++)
								@if ($i <= number_format($commentstar ,0, '.', ''))
								<i class="fa fa-star"></i>
								@else
								<i class="fa fa-star-o"></i>
								@endif
							@endfor
							</div>
							<a class="review-link" href="#">Đánh giá(s) | Thêm đánh giá</a>
						</div>
						<div>
							@if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id == $products->category_id && $sale_product->number_product>0)
							<h3 class="product-price">{{number_format($products->price-($products->price*($sale_product->discount/100)))}} <del class="product-old-price">{{number_format($products->price)}}</del></h3>
							<span class="product-available">Giảm sốc</span>
							@else
							<h3 class="product-price">{{number_format($products->price)}} </h3>
							@endif
						</div>
						<p style="color: red">Khuyến mại: kèm Balo, chuột quang, bàn di chuột.</p>
						<form action="{{route('save-cart')}}" method="post">
							@csrf
						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" name="quantity" value="1" min="1" max="5">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<input type="hidden" name="product_id" value="{{$products->id}}" />
							@if ($products->Quantity <= 1)
							<button type="submit" class="btn add-to-cart-btn disabled "><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</button>
							@elseif ($products->Quantity > 1)
							<button type="submit" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm Vào Giỏ</button>
							@endif
						</div>
						</form>
						<ul class="product-links">
						<li>Tình trạng:</li>
					    @if ($products->Quantity <= 1) Hết Hàng @elseif ($products->Quantity > 1)
						<li>Còn Hàng</li>
						@else
						<li>Đang chờ</li>
						@endif
						</ul>
						<ul class="product-links">
							<li>Số lượng:</li>
							<li>{{$products->Quantity}}</li>
						</ul>
						<ul class="product-links">
							<li>Thẻ tag:</li>
							@foreach($product_category->tags as $tagItem )
							<li><a href="#">{{$tagItem->name}}</a></li>
							@endforeach
						</ul>
						<ul class="product-links">
							<li>Danh mục:</li>
							<li><a href="#">{{optional($product_category->category)->name}}</a></li>
						</ul>

						<ul class="product-links">
							<li>Share:</li>
							<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.google.com/"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="https://mail.google.com/"><i class="fa fa-envelope"></i></a></li>
						</ul>

					</div>
				</div>
				
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Miêu Tả</a></li>
							<li><a data-toggle="tab" href="#tab2">Chi Tiết</a></li>
							<li><a data-toggle="tab" href="#tab3">Đánh Giá</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p>Miêu tả sản phẩm</p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							<div id="tab2" class="tab-pane fade in">
								<div class="row">
									<div class="col-md-12">
										<p>{!!$products->content!!}</p>
									</div>
								</div>
							</div>
							<!-- /tab2  -->

							<!-- tab3  -->
							<div id="tab3" class="tab-pane fade in">
								<div class="row">
									<!-- Rating -->
									<div class="col-md-3">
										<div id="rating">
											<div class="rating-avg">
												<span>{{number_format($commentstar ,1, '.', '')}}</span>
												<div class="rating-stars">
													@for ($i=1;$i<=5;$i++)
														@if ($i <= number_format($commentstar ,0, '.', ''))
														<i class="fa fa-star"></i>
														@else
														<i class="fa fa-star-o"></i>
														@endif
													@endfor
													</div>
											</div>
											<ul class="rating">
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 70%;"></div>
													</div>
													<span class="sum">{{$countstar5}}</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 60%;"></div>
													</div>
													<span class="sum">{{$countstar4}}</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 15%;"></div>
													</div>
													<span class="sum">{{$countstar3}}</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 20%;"></div>
													</div>
													<span class="sum">{{$countstar2}}</span>
												</li>
												<li>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</div>
													<div class="rating-progress">
														<div style="width: 10%;"></div>
													</div>
													<span class="sum">{{$countstar1}}</span>
												</li>
											</ul>
										</div>
									</div>
									<!-- /Rating -->

									<!-- Reviews -->
									<div class="col-md-6">
										<div id="reviews">
											<form>
											@csrf
											<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$products->id}}">
											<ul class="reviews">
												<div id="comment_show"></div>
											</ul>
											</form>
											{{-- <ul class="reviews-pagination">
												<li class="active">1</li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
											</ul> --}}
										</div>
									</div>
									<!-- /Reviews -->

									<!-- Review Form -->
									<div class="col-md-3">
										<div id="review-form">
											<form class="review-form" action="#">
												<input class="input name_comment" name="name"  type="text" placeholder="Tên">
												<textarea class="input conten_comment" name="comment" placeholder="Đánh Giá"></textarea>
												<div class="input-rating">
													<span>Sao: </span>
													<div class="stars">
														<input id="star5" class="star_comment" name="rating" value="5" type="radio"><label for="star5"></label>
														<input id="star4" class="star_comment4" name="rating" value="4" type="radio"><label for="star4"></label>
														<input id="star3" class="star_comment" name="rating" value="3" type="radio"><label for="star3"></label>
														<input id="star2" class="star_comment" name="rating" value="2" type="radio"><label for="star2"></label>
														<input id="star1" class="star_comment" name="rating" value="1" type="radio"><label for="star1"></label>
													</div>
												</div>
												<button type="button" class="primary-btn submit_comment">Bình Luận</button>
												<div id="notify_comment"></div>
											</form>
										</div>
									</div>
								@endforeach	<!-- /Review Form -->
								</div>
							</div>
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
{{-- </section> --}}
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Sản Phẩm Liên Quan</h3>
				</div>
			</div>
			<!-- product -->
			@foreach ($product as $product)
			<div class="col-md-3 col-xs-6">
				<div class="product">
					<div class="product-img">
						<img src="{{ $product->feature_image_path }}" alt="">
						<div class="product-label">
							@if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id == $product->category_id && $sale_product->number_product>0)
							<span class="sale">{{$sale_product->discount}}%</span>
							@else
							@endif
						</div>
					</div>
					<div class="product-body" style="height: 263px">
						<p class="product-category">{{$product->category->name}}</p>
						<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
						@if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id == $product->category_id && $sale_product->number_product>0)
						<h4 class="product-price">{{number_format($product->price-($product->price*($sale_product->discount/100)))}}<del class="product-old-price">{{number_format($product->price)}}</del></h4>
						@else
						<h4 class="product-price">{{number_format($product->price)}}</h4>
						@endif
						<div class="product-rating"></div>
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
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection