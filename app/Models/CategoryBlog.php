<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model

{
    use HasFactory;

    // Tên bảng trong database
    protected $table = 'categoriesblog';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'name',
    ];

    // Các mối quan hệ (nếu có)
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}