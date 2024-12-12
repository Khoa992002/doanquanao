<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $table = 'products';

    // Các cột có thể được gán giá trị thông qua mass assignment
    protected $fillable = [
        'name',                // Tên sản phẩm
        'description',         // Mô tả sản phẩm
        'price',               // Giá sản phẩm
        'stock',               // Số lượng tồn kho
        'size',                // Kích cỡ
        'color',               // Màu sắc
        'brand',               // Thương hiệu
        'category_id',         // ID của danh mục liên kết
        'status',              // Trạng thái sản phẩm (có sẵn/hết hàng)
        'discount',            // Giảm giá (nếu có)
        'sku',                 // Mã sản phẩm (SKU)
        'main_image_url',
        'size_id',
        'category_id',
        'category_id',
           // URL hình ảnh đại diện chính
    ];
     public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->withPivot('stock_quantity', 'price')
                    ->withTimestamps();
    }

    // Các cột ngày tháng sẽ tự động được Laravel xử lý
    protected $dates = ['created_at', 'updated_at'];
}
