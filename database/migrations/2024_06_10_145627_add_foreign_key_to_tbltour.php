<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tbltour', function (Blueprint $table) {
            // Thêm khóa ngoại vào cột idHotel
            $table->foreign('idHotel')->references('idHotel')->on('tblhotel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbltour', function (Blueprint $table) {
            // Xóa khóa ngoại nếu rollback
            $table->dropForeign(['idHotel']);
        });
    }
};
