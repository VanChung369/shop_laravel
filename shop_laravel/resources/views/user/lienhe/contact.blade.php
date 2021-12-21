@extends('layouts.master')

@section('title')
<title>liên hệ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
<link rel="stylesheet" href="{{ asset('home/lienhe/css.css') }}">
@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 padding-right">
				<div class="container">
                    <div style="text-align:center">
                        <h2 class="title text-center">liên hệ</h2>
                    </div>
                    <div class="row">
                        <div id="map-container-section" class="column" >
                            <iframe src="https://maps.google.com/maps?q=Manhatan&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" width="468px" height="537px"
                              style="border:0" allowfullscreen></iframe>
                          </div>
                      <div class="column">
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                          <label for="name">Tên</label>
                          <input type="text" id="name" name="name" placeholder="Nhập Tên.">
                          <label for="lname">Email</label>
                          <input type="text" id="email" name="email" placeholder="Nhập email.">
                          <label for="country">Khu vực</label>
                          <select id="country" name="country">
                            <option value="Việt nam">việt nam</option>
                            <option value="Nhật bản">Nhật bản</option>
                            <option value="usa">USA</option>
                          </select>
                          <label for="messeger">Tinh nhắn</label>
                          <textarea id="messeger" name="messeger" placeholder="Write something.." style="height:169px"></textarea>
                          <input type="submit" style="background-color: red" value="Gửi">
                        </form>
                      </div>
                    </div>
                  </div>
			</div>
		</div>
	</div>
</section>
@endsection