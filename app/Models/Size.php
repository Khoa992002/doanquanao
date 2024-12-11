<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size']; // Cho phép cột 'size' được gán hàng loạt
    // Mối quan hệ nhiều-nhiều với bảng products thông qua bảng product_sizes
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sizes')
                    ->withPivot('stock_quantity', 'price')
                    ->withTimestamps();
    }
}
