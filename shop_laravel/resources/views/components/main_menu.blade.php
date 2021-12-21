<style>
    .sub-menu{
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown:hover .sub-menu{
        display: block;
    }
</style>
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">Trang chủ</a></li>
                @foreach($categorysLimit as $categoryParent)
                <li class="dropdown"><a href="#"> {{ $categoryParent->name }}<i class="fa fa-angle-down"></i></a>
                 @include('components.child_menu', ['categoryParent' => $categoryParent])
                </li>
               @endforeach
               <li><a href="{{route('status')}}">Đơn hàng</a></li>
               <li><a href="{{route('show-cart')}}">Giỏ hàng</a></li>
               <li><a href="{{route('contact')}}" >Liên hệ</a></li>
                
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
