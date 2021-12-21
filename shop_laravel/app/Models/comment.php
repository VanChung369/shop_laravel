<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable=['comment','name','product_id','status','star'];
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id'); 
    }
}
