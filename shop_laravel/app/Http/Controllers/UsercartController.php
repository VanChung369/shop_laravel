<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\order;
use App\Models\Sale_product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class UsercartController extends Controller
{
    private $product;
    private $order;
    function __construct( Product $product, order $order)
    {
        $this->product = $product;
        $this->order=$order;
    }
    public function savecart(Request $request)
    {
       $product_id=$request->product_id;
       $quantity=$request->quantity;
       $sale_product = Sale_product::orderByDesc('id')->first();
       $product_info=$this->product->where('id', $product_id)->first();
       $data['id'] = $product_id;
       $data['qty'] = $quantity;
       $data['name'] = $product_info->name;
        if($sale_product->date_start<Carbon::now() && $sale_product->date_end>Carbon::now() && $sale_product->sale->category_id == $product_info->category_id && $sale_product->number_product>0)
        {
            $data['price']=$product_info->price-($product_info->price*($sale_product->discount/100));
        }
        else
        {
            $data['price'] = $product_info->price;
        }
       $data['weight'] = $product_info->category_id;
       $data['options']['image'] = $product_info->feature_image_path;
       Cart::add($data);
       Cart::setGlobalTax(0);
       return redirect()->route('show-cart');
    }
    public function showcart()
    {
        $categorys = category::where('parent_id', 0)->get();
        $categorysLimit = category::where('parent_id', 0)->take(3)->get();
        return view('user.cart.show_cart', compact('categorys','categorysLimit'));
    }
    public function deletecart($id){
        Cart::remove($id);
        return Redirect()->to('show-cart');
    }
    public function updatecart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect()->to('show-cart');
    }
    public function status()
    {
        $categorys = category::where('parent_id', 0)->get();
        $categorysLimit = category::where('parent_id', 0)->take(3)->get();
        $order = $this->order->where('user_id', Session::get('adduser'))->get();
        return view('user.cart.status',compact('categorys','categorysLimit','order'));
    }
}
