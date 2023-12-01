<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = "order_detail";
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id')->whereIn('status', [1, 2]);
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->whereIn('status', [1, 2]);
    }
    public function getProductNameAttribute()
    {
        return $this->product->name ?? 'N/A';
    }
}
