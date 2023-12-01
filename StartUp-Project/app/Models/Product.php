<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->whereIn('status', [1, 2]);
    }
    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'N/A';
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id')->whereIn('status', [1, 2]);
    }
    public function getSupplierNameAttribute()
    {
        return $this->supplier->name ?? 'N/A';
    }
}
