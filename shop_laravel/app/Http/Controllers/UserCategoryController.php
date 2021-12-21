<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Sale_product;
use App\Models\Product;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function index($slug, $categoryId)
   {
       $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
       $categorys = Category::where('parent_id', 0)->get();
       $products = Product::where('category_id', $categoryId)->paginate(6);
       $sale_product = Sale_product::orderByDesc('id')->first();
       $productsWidget = Product::orderByDesc('id')->take(3)->get();
      return view('product.category.list', compact('productsWidget','categorysLimit', 'products','categorys','sale_product'));
   }
}
