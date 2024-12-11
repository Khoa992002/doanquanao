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
        Schema::table('blogs', function (Blueprint $table) {
            // Sửa cột category_id để có kiểu BIGINT(20) UNSIGNED
            $table->foreignId('category_id')->nullable()->constrained('categoriesblog')->onDelete('set null')->change();
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Lùi lại thay đổi (nếu cần)
            $table->dropForeign(['category_id']);
            $table->unsignedBigInteger('category_id')->nullable()->change();
        });
    }
};
