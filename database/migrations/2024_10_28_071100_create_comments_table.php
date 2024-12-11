<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('comments', function (Blueprint $table) {
            $table->id();  // Tạo cột id tự động tăng
            $table->unsignedBigInteger('user_id'); // ID người dùng
            $table->unsignedBigInteger('product_id'); // ID bài viết (hoặc sản phẩm) mà người dùng bình luận
            $table->text('content'); // Nội dung bình luận
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
