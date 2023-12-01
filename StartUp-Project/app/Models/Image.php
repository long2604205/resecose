<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public function image()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    public function getImagePathAttribute()
    {
        return $this->image->img ?? 'N/A';
    }
}