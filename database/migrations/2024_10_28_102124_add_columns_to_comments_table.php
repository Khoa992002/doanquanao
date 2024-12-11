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
        Schema::table('comments', function (Blueprint $table) {
            $table->string('level')->nullable();   // Cột 'level', kiểu chuỗi và có thể null
            $table->string('avatar')->nullable();  // Cột 'avatar', kiểu chuỗi để lưu đường dẫn ảnh
            $table->string('name')->nullable();    // Cột 'name', kiểu chuỗi để lưu tên người dùng
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
