<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    private $product;
    private $order;
    private $order_item;
    public function __construct(Product $product, order $order , order_item $order_item)
    {
        $this->product = $product;
        $this->order = $order;
        $this->order_item = $order_item;
    }
    public function index()
    {
        $product = $this->product->get();
        $order = $this->order->latest()->paginate(5);
        return view('admin.order.index', compact('product', 'order'));
    }
    public function edit($id)
    {
        $order = $this->order->find($id);
        $order_item= $this->order_item->where('order_id',$id)->get();
        return view('admin.order.edit', compact('order','order_item'));
    }
    public function update($id, Request $request)
    {
        $dataProductUpdate = [
            'status' => $request->status,
        ];
        $order = $this->order->latest()->paginate(5);
        $product = $this->product->get();
        $this->order->find($id)->update($dataProductUpdate);
        return view('admin.order.index', compact('product', 'order'));
    }
    public function delete($id)
    {
        $this->order->find($id)->delete();
        $order_item= $this->order_item->where('order_id',$id)->delete();
        return redirect()->route('order.index');
    }
}
