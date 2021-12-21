<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Product;
use App\Models\Sale_product;
use App\Models\comment;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    private $category;
    private $product;
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;

    }
    public function index($slug,$id)
    {
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::where('id', $id)->get();
        $product_category=$this->product->find($id);
        $product = Product::where('category_id',$product_category->category->id)->take(4)->get();
        $sale_product = Sale_product::orderByDesc('id')->first();
        $commentstar= comment::where('status',0)->where('product_id',$id)->avg('star');
        $countstar5= comment::where('status',0)->where('product_id',$id)->where('star',5)->count();
        $countstar4= comment::where('status',0)->where('product_id',$id)->where('star',4)->count();
        $countstar3= comment::where('status',0)->where('product_id',$id)->where('star',3)->count();
        $countstar2= comment::where('status',0)->where('product_id',$id)->where('star',2)->count();
        $countstar1= comment::where('status',0)->where('product_id',$id)->where('star',1)->count();
        return view('user.sanpham.show_details', compact('countstar1','countstar2','countstar3','countstar4','countstar5','commentstar','categorysLimit', 'products', 'categorys','product_category','product','sale_product'));
    }
}
