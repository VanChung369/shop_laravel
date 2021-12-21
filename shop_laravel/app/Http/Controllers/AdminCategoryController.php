<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Components\Recusive;
use app\Components\recusive as ComponentsRecusive;

class AdminCategoryController extends Controller
{
    private $category;
    public function __construct(category $category)
    {
        $this->category = $category;
    }
    // return ve view categrory add
    public function create() // tao select
    {
        $htmloption = $this->get_category($parent_id = '');
        return view('admin.category.add', compact('htmloption')); // compact truyen du lieu sang bang view
    }

    //
    //return ve view categrory
    public function index()
    {
        $category = $this->category->oldest()->paginate(5); // lay ra nhung danh muc moi nhat tren moi trang có 5 ban nghi
        // return dd($category);
        return view('admin.category.index', compact('category'));
    }
    // fun store
    public function store(Request $request)
    {
        $this->category->create([ // them du lieu vao trong bang category
            'name' => $request->name, // request['name'] // bat duoc ca phuong thuc get va post;
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('category.index'); // tra ve lai trang chu (header)

    }
    public function get_category($parent_id)
    {
        $data = $this->category->all();
        $Recusive = new Recusive($data);
        $htmloption = $Recusive->categoryRecusive($parent_id);
        return $htmloption;
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmloption = $this->get_category($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmloption'));
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('category.index');
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('category.index');
    }
}
