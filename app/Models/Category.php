<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    // Các cột có thể được gán giá trị bằng cách sử dụng phương thức create() hoặc fill()
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];
}
