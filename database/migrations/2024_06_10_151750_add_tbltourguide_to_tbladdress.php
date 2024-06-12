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
        Schema::table('tbltourguide', function (Blueprint $table) {
            // Thêm cột idAddress làm khóa ngoại tham chiếu đến bảng tbladdress
            $table->foreign('idAddress')->references('idAddress')->on('tbladdress')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbltourguide', function (Blueprint $table) {
            // Xóa khóa ngoại khi rollback migration
            $table->dropForeign(['idAddress']);
        });
    }
};
