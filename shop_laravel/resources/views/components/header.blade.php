<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> {{ getConfigValueFromSettingTable('phone_contact') }}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{ getConfigValueFromSettingTable('email')}}</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>{{ getConfigValueFromSettingTable('address')}}</a></li>
            </ul>
            <ul class="header-links pull-right">
                @if ((Session::get('adduser')!=Null))
                <li><a href="{{route('checkout')}}"><i class="fa fa-dollar"></i> Thanh Toán</a></li>
                @else
                <li><a href="{{route('login-checkout')}}"><i class="fa fa-dollar"></i>Thanh Toán</a></li>
                @endif
                @if (Session::get('adduser')!=Null)
                <li><a href="{{route('logout-checkout')}}"><i class="fa fa-user-o"></i>Đăng xuất</a></li>
                @else
                <li><a href="{{route('login-checkout')}}"><i class="fa fa-user-o"></i>Đăng nhập</a></li>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="/eshopper/img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{route('search')}}" method="post">
                            @csrf
                            <select class="input-select" style="width: 129.14px">
                                <option value="0">Tên SP</option>
                            </select>
                            <input type="search" class="input" name="Keywords_sumbit"  placeholder="Tìm Kiếm">
                            <button type="submit" class="search-btn">Tìm Kiếm</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->
                @php
                $content = Cart::content();
                @endphp
                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng</span>
                                <div class="qty">{{$content->count()}}</div>
                            </a>  
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @foreach($content as $contents)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{$contents->options->image}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$contents->name}}</a></h3>
                                            <h4 class="product-price"><span class="qty">{{$contents->qty}}x</span>{{number_format($contents->price)}}</h4>
                                        </div>
                                        <a class="delete" href="{{route('delete-to-cart',['id'=>$contents->rowId])}}"><i class="fa fa-close"></i></a>
                                    </div>
                                     @endforeach
                                </div>
                                
                                <div class="cart-summary">
                                    <small>{{$content->count()}} Mục Chọn </small>
                                    <h5>Tổng:{{Cart::total(0,'.' ,'.')}}</h5>
                                </div>
                               
                                <div class="cart-btns">
                                    <a href="{{route('show-cart')}}">Xem giỏ</a>
                                    <a href="{{route('checkout')}}">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                        </div>
                       
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
@include('components/main_menu')