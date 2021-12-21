<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded =[];
    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
    public function payment()
    {
        return $this->belongsTo(payment::class, 'payment_id');
    }
}
