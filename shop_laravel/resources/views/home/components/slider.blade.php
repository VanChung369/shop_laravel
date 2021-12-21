<style>
    .carousel-indicators {
    bottom: -20px;
}
/* .carousel-control {
    position: absolute;
    top: 0;
    bottom: 140px;
    left: 0;
    width: 52px;
    font-size: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgb(0 0 0 / 60%);
    background-color: rgba(0,0,0,0);
    filter: alpha(opacity=50);
    opacity: .5;
} */
</style>
<div class="section">
    <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" style="background-color: red" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" style="background-color: red" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" style="background-color: red" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" style="height: 350px">

                        @foreach($sliders as $key => $slider)
                        <div class="item {{ $key == 0 ? 'active' : '' }}">
                            <div class="col-sm-6" style="margin-top: 100px">
                                <h1><span style="color: red">COMPUTER</span>-SHOPPER</h1>
                                <h2>{{ $slider->name }}</h2>
                                <p>{{ $slider->description }}</p>
                                <button type="button" class="btn btn-default get">Mua ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img height="540" width="540" src="{{$slider->image_path }}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <a href="#slider-carousel" class="left carousel-control hidden-xs" data-slide="next" style="top: 50%;background: none;color:#d10024;">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right carousel-control hidden-xs" data-slide="next" style="top: 50%;background: none;color:#d10024;" >
                        <i class="fa fa-angle-right"></i>
                    </a>
                
                </div>

            </div>
        </div>
    </div>
   
         
</div>


