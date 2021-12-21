{{-- <div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">

            @foreach($categorys as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                            <span class="pull-right">
                                @if($category->categoryChildrent->count())
                                <i class="fa fa-plus"></i>
                                @endif
                            </span>
                            {{ $category->name }}
                        </a>
                    </h4>
                </div>


                <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($category->categoryChildrent as $categoryChilrent)
                            <li>
                                <a href="{{ route('category.product',
                                        ['slug' => $categoryChilrent->slug, 'id' => $categoryChilrent->id]) }}">
                                    {{ $categoryChilrent->name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <!--/category-products-->
    </div>
    <div class="shipping text-center"><!--shipping-->
        <img src="{{asset('Eshopper/images/home/shipping.jpg')}}" alt="" />
    </div>
</div>
 --}}
<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Danh Mục</h3>
        <div class="panel-group category-products" id="accordian">
            @foreach($categorys as $category)
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$category->id}}">
                            <span class="pull-right">
                                @if($category->categoryChildrent->count())
                                <i class="fa fa-plus"></i>
                                @endif
                            </span>
                            {{ $category->name }}
                        </a>
                    </h4>
                </div>
                <div id="sportswear_{{$category->id}}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @foreach($category->categoryChildrent as $categoryChilrent)
                            <li>
                                <a href="{{ route('category.product',
                                        ['slug' => $categoryChilrent->slug, 'id' => $categoryChilrent->id]) }}">
                                    {{ $categoryChilrent->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Giá</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number" value="">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number" value="">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Sản phẩm mới</h3>
        @foreach ($productsWidget as $productsWidget)
        <div class="product-widget">
            <div class="product-img">
                <img src="{{$productsWidget->feature_image_path}}" alt="">
                <div class="product-label">
                  <span style="background-color: #D10024;border-color: #D10024;color: #FFF; border: 0.5px solid;padding: 1px 1px;font-size: 10px; position: absolute;top: -1px;">NEW</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category">{{$productsWidget->category->name}}</p>
                <h3 class="product-name"><a href="{{route('UserProduct.index', ['slug'=>$productsWidget->category->slug,'id' => $productsWidget->id ])}}">{{$productsWidget->name}}</a></h3>
                @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now()&& $sale_product->sale->category_id == $productsWidget->category_id && $sale_product->number_product>0)
                    <h4 class="product-price">{{number_format($productsWidget->price-($productsWidget->price*($sale_product->discount/100)))}} <del class="product-old-price">{{number_format($productsWidget->price)}}</del></h4>
                    @else
                    <h4 class="product-price">{{number_format($productsWidget->price)}} </h4>
                    @endif
            </div>
        </div>
        @endforeach
    </div>
    <!-- /aside Widget -->
</div>