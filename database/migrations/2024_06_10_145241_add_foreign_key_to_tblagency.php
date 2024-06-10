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
        Schema::table('tblagency', function (Blueprint $table) {
            // Thêm khóa ngoại vào cột idTourGuide
            $table->foreign('idTourGuide')->references('idTourGuide')->on('tbltourguide')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblagency', function (Blueprint $table) {
            // Xóa khóa ngoại nếu rollback
            $table->dropForeign(['idTourGuide']);
        });
    }
};
