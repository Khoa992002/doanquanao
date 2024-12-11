<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title', 
        'content', 
        'category_id', 
        'summary',
        'user_id', 
        'image'
    ];

    // Quan hệ với bảng CategoryBlog
    public function category()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_id');
    }

    // Quan hệ với bảng Users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id'); // Giả sử cột 'author_id' trong bảng blogs là khóa ngoại tham chiếu đến bảng users
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }
    public function users()
{
    return $this->belongsTo(Product::class, 'user_id');  // Giả sử 'product_id' là cột liên kết đến sản phẩm
}
}
