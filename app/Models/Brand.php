<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     use HasFactory;

    // Các cột được phép ghi vào
    protected $fillable = ['name', 'description', 'logo', 'website'];

    // Một nhãn hàng có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
