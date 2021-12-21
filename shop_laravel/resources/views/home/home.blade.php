@extends('layouts.master')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection


@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<!--/slider-->
@include('home.components.slider')
            {{-- @include('components.sidebar') --}}
                <!--recommended_items-->
                @include('home.components.recommend_product')
                <!--/recommended_items--> 
                <!--category-tab-->
                @include('home.components.category_tab')
                <!--/category-tab-->
                {{-- @include('home.components.feature_product') --}}

</section>
@endsection