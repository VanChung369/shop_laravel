<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class category extends Model
{
   use SoftDeletes;
   protected $fillable=['name','parent_id','slug']; // thiet lap cac cot duoc inster trong bang 
   // protected $table = 'categories'; thiet lap ten bang de mapping vs csdl
   public function categoryChildrent()
   {
       return $this->hasMany(Category::class, 'parent_id');
   }
   public function products()
   {
       return $this->hasMany(Product::class, 'category_id');
   }
}
