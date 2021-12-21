<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm bán chạy</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($productsRecommend as $keyRecommend => $productsRecommendItem )
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{$productsRecommendItem->feature_image_path }}" alt="">
                                        <div class="product-label">
                                            @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id == $productsRecommendItem->category_id && $sale_product->number_product>0)
                                            <span class="sale">{{$sale_product->discount}}%</span>
                                            @else
                                            @endif
                                            {{-- <span class="new">NEW</span> --}}
                                        </div>
                                    </div>
                                    <div class="product-body" style="height: 263px">
                                        <p class="product-category">{{$productsRecommendItem->category->name}}</p>
                                        <h3 class="product-name"><a href="#">{{ $productsRecommendItem->name }}</a></h3>
                                        @if ($sale_product->date_start<Carbon\Carbon::now() && $sale_product->date_end>Carbon\Carbon::now() && $sale_product->sale->category_id == $productsRecommendItem->category_id && $sale_product->number_product>0)
                                        <h4 class="product-price">{{ number_format($productsRecommendItem->price-($productsRecommendItem->price*($sale_product->discount/100)))}}<del class="product-old-price">{{ number_format($productsRecommendItem->price)}}</del></h4>
                                        @else
                                        <h4 class="product-price">{{ number_format($productsRecommendItem->price)}}<h4>
                                        @endif
                                        @php
                                        $star=0;
                                        $i=0;
                                            foreach ($productsRecommendItem->comment as $value) {
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
                                           <button class="quick-view"> <a href="{{route('UserProduct.index', ['slug'=>$productsRecommendItem->category->slug,'id' => $productsRecommendItem->id ])}}"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <form action="{{route('save-cart')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1" />
                                            <input type="hidden" name="product_id" value="{{$productsRecommendItem->id}}" />
                                            @if ($productsRecommendItem->Quantity <= 1) <button type="submit"
                                                class="btn add-to-cart-btn disabled">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm Vào Giỏ
                                                </button>
                                                @elseif ($productsRecommendItem->Quantity > 1)
                                                <button type="submit" class="btn add-to-cart-btn">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Thêm Vào Giỏ
                                                </button>
                                                @endif
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown " id="clockdiv">
                        <li>
                            <div>
                                <h3 class="days"></h3>
                                <span class="smalltext">Days</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="hours"></h3>
                                <span class="smalltext">Hours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="minutes"></h3>
                                <span class="smalltext">Mins</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 class="seconds"></h3>
                                <span class="smalltext">Secs</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">Shop now</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<script type='text/javascript'>
    function getTimeRemaining(endtime) {
      var t = Date.parse(endtime) - Date.parse(new Date());
      var seconds = Math.floor((t / 1000) % 60);
      var minutes = Math.floor((t / 1000 / 60) % 60);
      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
      var days = Math.floor(t / (1000 * 60 * 60 * 24));
      return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
      };
    }
    
    function initializeClock(id, endtime) {
      var clock = document.getElementById(id);
      var daysSpan = clock.querySelector('.days');
      var hoursSpan = clock.querySelector('.hours');
      var minutesSpan = clock.querySelector('.minutes');
      var secondsSpan = clock.querySelector('.seconds');
    
      function updateClock() {
        var t = getTimeRemaining(endtime);
        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
    
        if (t.total <= 0) {
          clearInterval(timeinterval);
        }
      }
      updateClock();
      var timeinterval = setInterval(updateClock, 1000);
    }
    var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);
    </script>