<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Các trường có thể điền giá trị
    protected $fillable = [
        'user_id',
        'product_id',
        'content',
        'level',       // Cấp độ của đánh giá (nếu có)
        'avatar',      // Đường dẫn ảnh đại diện
        'name',        // Tên người dùng
        'rating',      // Điểm đánh giá (số sao)
    ];

    /**
     * Quan hệ với model Product
     * Một đánh giá thuộc về một sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Quan hệ với model User
     * Một đánh giá thuộc về một người dùng
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Accessor: Lấy tên sản phẩm
     * Nếu sản phẩm không tồn tại, trả về "Không xác định"
     */
    public function getProductNameAttribute()
    {
        return $this->product ? $this->product->name : 'Không xác định';
    }

    /**
     * Accessor: Xử lý avatar mặc định nếu không có
     * Trả về đường dẫn ảnh mặc định nếu không có avatar
     */
    public function getAvatarAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('default-avatar.png');
    }

    /**
     * Scope: Lọc đánh giá theo sản phẩm
     */
    public function scopeForProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }

    /**
     * Scope: Lọc đánh giá theo người dùng
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
