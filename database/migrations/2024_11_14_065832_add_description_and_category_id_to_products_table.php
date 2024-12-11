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
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable();   // Thêm cột description
            $table->unsignedBigInteger('category_id')->nullable(); // Sử dụng unsignedBigInteger cho category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); // Khóa ngoại liên kết với bảng categories
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
