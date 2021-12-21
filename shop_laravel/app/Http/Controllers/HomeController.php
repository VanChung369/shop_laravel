<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use App\Models\category;
use App\Models\Product;
use App\Models\comment;
use App\Models\Sale_product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $category = Category::where('parent_id', 1)->get();
        $products = Product::latest()->take(9)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(9)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $sale_product = Sale_product::orderByDesc('id')->first();
        return view('home.home', compact('sliders', 'categorys','category', 'products', 'productsRecommend', 'categorysLimit','sale_product'));
    }
}
