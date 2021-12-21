<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\order;
use App\Models\payment;
use App\Models\order_item;
use App\Models\Product;
use App\Models\Sale_product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

session_start();
class UsercheckoutController extends Controller
{
    private $user;
    private $customer;
    private $order;
    private $payment;
    private $order_item;
    private $product;
    private $sale_product;
    public function __construct(User $user, customer $customer, order $order, payment $payment ,order_item $order_item , Product $product, Sale_product $sale_product)
    {
        $this->user = $user;
        $this->customer = $customer;
        $this->order = $order;
        $this->payment = $payment;
        $this->order_item = $order_item;
        $this->product=$product;
        $this->sale_product=$sale_product;
    }
    public function logincheckout()
    {
        $categorys = category::where('parent_id', 0)->get();
        $categorysLimit = category::where('parent_id', 0)->take(3)->get();
        return view('user.checkout.login_checkout', compact('categorys', 'categorysLimit'));
    }
    public function logoutcheckout()
    {
        Session::flush(); // xóa tất cả dữ liệu 
        return redirect()->to('login-checkout');
    }
    public function logincustomer(Request $request)
    {
        //md5() ma hoa mk
        $remember = $request->has('remember') ? true : false;
        if (auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            Session::put('adduser', auth()->user()->id);
            return redirect()->to('login-checkout');
        }
    }
    public function addcustomer(Request $request)
    {
        DB::beginTransaction();
        $adduser = $this->user->create([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'password' => Hash::make($request->customer_password) // ma hoa pass 
        ]);
        DB::commit();
        Session::put('adduser', $adduser);
        return redirect()->to('');
    }
    public function checkout()
    {
        $categorys = category::where('parent_id', 0)->get();
        $categorysLimit = category::where('parent_id', 0)->take(3)->get();
        return view('user.checkout.show_checkout', compact('categorys', 'categorysLimit'));;
    }
    public function savecheckout(Request $request)
    {
        DB::beginTransaction();
        // instert customers
        $customers = $this->customer->create([
            'name' => $request->shipping_name,
            'address' => $request->shipping_address,
            'phone' => $request->shipping_phone,
            'note' => $request->shipping_notes,
        ]);
       
        // instert payment
        $payments = $this->payment->create([
            'method' => $request->payment_option,
            'status' => 'Đang sử lý',
        ]);
        //inster order
        $order = $this->order->create([
            'user_id' => Auth()->id(),
            'status' => 'Đang sử lý',
            'customer_id' => $customers->id,
            'payment_id'=> $payments->id,
            'total' => Cart::total(0, ',', '.'),
        ]);
        //inster order_item
        $content = Cart::content();
        foreach($content as $contents)
        {
           
           $order_item = $this->order_item->create([
                'order_id'=>$order->id,
                'product_id'=>$contents->id,
                'name'=>$contents->name,
                'price'=>$contents->price,
                'Quantity'=>$contents->qty,
            ]);
            $product=$this->product->find($order_item->product_id);
            $product->update([
                'Quantity'=>$product->Quantity-$order_item->Quantity,
                'views_count'=>$product->views_count+$order_item->Quantity,
            ]);
            $sale_products=$this->sale_product->get();
            foreach ($sale_products as $sale)
            {
            $sale_product=$this->sale_product->where('sale_id',$sale->sale->id)->first();
            if($sale_product!=null)
            {
                $sale_product->update([
                    'number_product'=>$sale_product->number_product-$order_item->Quantity,
                ]);
            }
            }
        }
        DB::commit();
        $categorys = category::where('parent_id', 0)->get();
        $categorysLimit = category::where('parent_id', 0)->take(3)->get();
        $payment = $payments->method;
        Cart::destroy();
        return view('user.checkout.handcash', compact('categorys', 'categorysLimit','payment'));
       
    }
}
