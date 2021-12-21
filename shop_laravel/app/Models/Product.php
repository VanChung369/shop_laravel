<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = []; // nguoc voi fillable 

    use SoftDeletes;
    const paginates = 5;
    //Eloquent
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
        // 1 nhieu 
        // Eloquent sẽ tìm kiếm giá trị của id cột của người dùng trong user_id
        // cột của Phone bản ghi. Nếu bạn muốn mối quan hệ sử dụng giá trị 
        // khóa chính khác với id hoặc thuộc tính mô hình của $primaryKeybạn. 
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
        // nhieu nhieu
        //belongsToMany(ten class, 'bang trung gian lien ket', 'truong lien ket voi bang product', 'truong lien ket voi bang tag')
    }
    public function order()
    {
        return $this->belongsToMany(order::class, 'order_items', 'product_id', 'order_id')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // nhieu 1
    }

    public function productImages()
    {
        //khi goi den productImages se chuyen vao mo do ProductImage lay ra cac thuoc tinh cua bang productImages product_id = Product.id
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function comment()
    {
        return $this->hasMany(comment::class, 'product_id');
    }
    public function getProductSearch($request)
    {
        $products = new Product();
        if (!empty($request->product_id)) {
            $products = $products->where('products.id', $request->product_id);
        }
        if (!empty($request->name)) {
            $products = $products->where('products.name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->category_id)) {
            $products = $products->where('products.category_id', $request->category_id);
        }
        if (!empty($request->tags)) {
            $products = $products->join('product_tags', 'products.id', 'product_tags.product_id')
                ->join('tags', 'product_tags.tag_id', 'tags.id')
                ->where('tags.name', 'like', '%' . $request->tags . '%');
        }
        $products = $products
            // ->groupBy('products.id')
            // ->select('products.*')
            ->latest('products.created_at')
            ->paginate(Product::paginates);
        return $products;
    }
}
