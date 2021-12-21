<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Sale;
use App\Models\Sale_product;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Components\recusive;

class AdminSaleController extends Controller
{
    private $category;
    private $product;
    private $Sale;
    private $Sale_product;
    function __construct(Category $category, Product $product ,Sale $sale,Sale_product $sale_product)
    {
        $this->category = $category;
        $this->product = $product;
        $this->Sale = $sale;
        $this->Sale_product = $sale_product;

    }
    public function index()
    {
       $sale_product = $this->Sale_product->get();
        return view('admin.sale.index',compact('sale_product'));

    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.sale.add', compact('htmlOption'));
    }
    public function store(Request $request)
    {
       $sale = $this->Sale->create([
            'name' => $request->name,
            'discount'=>$request->discount,
            'number_product'=>$request->number_product,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'start'=>$request->start,
            'end'=>$request->end,
        ]);

         $this->Sale_product->create([
             'sale_id'=>$sale->id,
             'name'=>$sale->name,
             'discount'=>$sale->discount,
             'number_product'=>$sale->number_product,
             'date_start'=>$sale->start,
             'date_end'=>$sale->end,
         ]);
         return redirect()->route('sale.index');
    }

    public function edit($id)
    {
        $Sale = $this->Sale->find($id);
        $htmlOption = $this->getCategory($Sale->category_id);
        return view('admin.sale.edit', compact('Sale','htmlOption'));
    }

    public function update(Request $request, $id)
    {
       
       $this->Sale->find($id)->update([
            'name' => $request->name,
            'discount'=>$request->discount,
            'number_product'=>$request->number_product,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'start'=>$request->start,
            'end'=>$request->end,
        ]);
        $sale = $this->Sale->find($id);
         $this->Sale_product->where('sale_id' ,$id)->update([
             'name'=>$sale->name,
             'discount'=>$sale->discount,
             'number_product'=>$sale->number_product,
             'date_start'=>$sale->start,
             'date_end'=>$sale->end,
         ]);
         return redirect()->route('sale.index');
    }
    public function delete($id)
    {
        $this->Sale->find($id)->delete();
        $this->Sale_product->where('sale_id' ,$id)->delete();
        return redirect()->route('sale.index');
    }
}
