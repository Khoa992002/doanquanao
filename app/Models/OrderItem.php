<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class OrderItem extends Model
{
    // Đặt tên bảng nếu không theo chuẩn Laravel (ở đây là 'order_items')
    protected $table = 'order_items';

    // Định nghĩa các thuộc tính có thể gán (fillable)
    protected $fillable = [
        'order_id',
        'product_id',
        'size',
        'quantity',
        'price',
        'name_size',
    ];

    // Mối quan hệ với bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); // Một sản phẩm thuộc về một đơn hàng
    }

    // Mối quan hệ với bảng products (nếu cần)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Một sản phẩm trong đơn hàng
    }
     
}
