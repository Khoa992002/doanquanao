<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';  // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id';  // Khóa chính của bảng
    protected $fillable = [
        'user_id', 'total_amount', 'status', 'shipping_address',
        'payment_method', 'tracking_number', 'created_at', 'updated_at','full_name','phone',
    ];

     // Mối quan hệ với bảng order_items
    public function items()
    {
        return $this->hasMany(OrderItem::class); // Một đơn hàng có nhiều sản phẩm
    }
}
