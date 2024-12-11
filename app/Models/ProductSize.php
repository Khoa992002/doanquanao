<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ProductSize extends Model
{
    use HasFactory;

    // Chỉ định bảng sử dụng cho model này
    protected $table = 'product_sizes';

    // Các trường có thể gán đại trà (mass assignable)
    protected $fillable = [
        'product_id',
        'size_id',
        'stock_quantity',
        'price',
    ];
    protected static function booted()
{
    static::saved(function ($productSize) {
        // Tính lại tổng số lượng tồn kho
        $totalStock = DB::table('product_sizes')
            ->where('product_id', $productSize->product_id)
            ->sum('stock_quantity');

        // Cập nhật tổng số lượng vào bảng products
        DB::table('products')
            ->where('id', $productSize->product_id)
            ->update(['stock' => $totalStock]);
    });

    static::deleted(function ($productSize) {
        // Tính lại tổng số lượng tồn kho
        $totalStock = DB::table('product_sizes')
            ->where('product_id', $productSize->product_id)
            ->sum('stock_quantity');

        // Cập nhật tổng số lượng vào bảng products
        DB::table('products')
            ->where('id', $productSize->product_id)
            ->update(['stock' => $totalStock]);
    });
}
}
