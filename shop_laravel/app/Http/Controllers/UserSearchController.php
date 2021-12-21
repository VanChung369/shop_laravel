<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Sale_product;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function search(Request $request){
        $keywords = $request ->Keywords_sumbit;
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $search_product = Product::where('name','like','%'.$keywords.'%')->get();
        $sale_product = Sale_product::orderByDesc('id')->first(); 
        $productsWidget = Product::orderByDesc('id')->take(3)->get();
        return view('user.sanpham.search', compact('productsWidget','sliders', 'categorys', 'products', 'productsRecommend', 'categorysLimit','search_product','sale_product'));
    }
}
