<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">sản phẩm</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            @foreach($category as $indexCategory => $categoryItem)
                            <li class="{{ $indexCategory == 0 ? 'active' : '' }}">
                                <a href="#category_tab_{{ $categoryItem->id }}" data-toggle="tab">
                                    {{ $categoryItem->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        @foreach($category as $indexCategoryProduct => $categoryItemProduct)
                        <div id="category_tab_{{ $categoryItemProduct->id }}"
                            class="tab-pane fade {{ $indexCategoryProduct == 0 ? 'active in' : '' }}">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
                                @foreach($categoryItemProduct->products as $key=> $productItemTabs)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{$productItemTabs->feature_image_path }}" alt="">
                                        <div class="product-label">
                                            @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->
                                                date_end>Carbon\Carbon::now() && $sale_product->sale->category_id ==
                                                $productItemTabs->category_id && $sale_product->number_product>0)
                                                <span class="sale">{{$sale_product->discount}}%</span>
                                                @else
                                                @endif
                                                {{-- <span class="new">NEW</span> --}}
                                        </div>
                                    </div>
                                    <div class="product-body" style="height: 263px">
                                        <p class="product-category">{{$productItemTabs->category->name}}</p>
                                        <h3 class="product-name"><a href="#">{{ $productItemTabs->name }}</a></h3>
                                        @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id ==$productItemTabs->category_id && $sale_product->number_product>0)
                                            <h4 class="product-price">{{ number_format($productItemTabs->price)}}<del class="product-old-price">{{number_format($productItemTabs->price-($productItemTabs->price*($sale_product->discount/100)))}}</del></h4>
                                            @else
                                            <h4 class="product-price">{{ number_format($productItemTabs->price)}}<h4>
                                             @endif
                                             
                                             @php
                                             $star=0;
                                             $i=0;
                                                 foreach ($productItemTabs->comment as $value) {
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
                                             <button class="quick-view"> <a href="{{route('UserProduct.index', ['slug'=>$productItemTabs->category->slug,'id' => $productItemTabs->id ])}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{route('save-cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product_id" value="{{$productItemTabs->id}}" />
                                            @if ($productItemTabs->Quantity <= 1) <button type="submit"
                                                class="btn add-to-cart-btn disabled">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm Vào Giỏ
                                                </button>
                                                @elseif ($productItemTabs->Quantity > 1)
                                                <button type="submit" class="btn add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Thêm Vào Giỏ
                                                </button>
                                                @endif
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

