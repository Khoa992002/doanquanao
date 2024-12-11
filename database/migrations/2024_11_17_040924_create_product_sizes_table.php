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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->unsignedBigInteger('product_id'); // Khóa ngoại tham chiếu đến bảng products
            $table->unsignedBigInteger('size_id');    // Khóa ngoại tham chiếu đến bảng sizes
            $table->integer('stock_quantity')->default(0); // Số lượng tồn kho
            $table->decimal('price', 10, 2)->nullable(); // Giá (có thể null nếu giá mặc định của sản phẩm đã đủ)
            $table->timestamps(); // Các trường created_at và updated_at

            // Ràng buộc khóa ngoại
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
};
