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
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // Mã định danh nhãn hàng
            $table->string('name'); // Tên nhãn hàng
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->string('logo')->nullable(); // Logo nhãn hàng
            $table->string('website')->nullable(); // Trang web nhãn hàng
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};
