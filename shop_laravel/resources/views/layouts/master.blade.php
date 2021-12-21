<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('Eshopper/css/prettify.css') }}" rel="stylesheet"> 
    <style>
      a#scrollUp{
        right: 97%;
      }
    </style>
    @yield('css')
    <title>Document</title>
</head>
<body>
    @include('components.header')
    @yield('content')
    @include('components.footer')
    <script src="{{asset('Eshopper/js/jquery-3.6.0.js')}}"></script>
    <script src="{{ asset('Eshopper/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/slick.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/main.js') }}"></script>
    <script src="{{ asset('Eshopper/js/jquery.zoom.min.js.js') }}"></script>
    <script src="{{ asset('Eshopper/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('Eshopper/js/lightslider.js') }}"></script>
    <script src="{{ asset('Eshopper/js/prettify.js') }}"></script>
  
    @yield('js')
    <script>
      var botmanWidget = {
     aboutText: 'Tôi có thê giúp gì cho bạn',
     introMessage: " Tôi có thê giúp gì cho bạn"
  };
  </script>
  <script src="{{ asset('Eshopper/js/widget.js') }}"></script>
    <script type="text/javascript">
    let star1;
        $(document).ready(function(){
        load_comment();
        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
                $('#comment_show').html(data);
              }
            });
            $('#star1').click(function()
            {
             star1=$('#star1').val();
            });
            $('#star2').click(function()
            {
             star1=$('#star2').val();
            });
            $('#star3').click(function()
            {
             star1=$('#star3').val();
            });
            $('#star4').click(function()
            {
             star1=$('#star4').val();
            });
            $('#star5').click(function()
            {
             star1=$('#star5').val();
            });
        }
      
        $('.submit_comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.name_comment').val();
            var comment_content = $('.conten_comment').val();
            var comment_stars= star1;
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/submit-comment')}}",
              method:"GET",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,comment_stars:comment_stars, _token:_token},
              success:function(data){
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công . Chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(5000);
                $('.name_comment').val('');
                $('.conten_comment').val('');
              }
            });
        });
    });
  //   $(document).ready(function() {
  //   $('#imageGallery').lightSlider({
  //       gallery:true,
  //       item:1,
  //       loop:true,
  //       thumbItem:3,
  //       slideMargin:0,
  //       enableDrag: false,
  //       currentPagerPosition:'left',
  //       onSliderLoad: function(el) {
  //           el.lightGallery({
  //               selector: '#imageGallery .lslide'
  //           });
  //       }   
  //   });  
  // });
  $(document).ready(function()
  {
    $('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');

		down.on('click', function () {
			var value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
		
		})
		up.on('click', function () {
			var value = parseInt($input.val()) + 1;
			$input.val(value);
		})
	});
  })
  </script>
</body>
</html>