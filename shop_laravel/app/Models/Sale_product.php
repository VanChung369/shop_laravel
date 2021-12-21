<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_product extends Model
{
    protected $guarded = [];
    public function sale()
    {
        return $this->belongsTo(sale::class,'sale_id'); // nhieu 1
    }

}
