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
        Schema::table('users', function (Blueprint $table) {
            // Thêm cột phone và idAddress vào bảng users
            $table->string('phone', 15)->nullable();
            $table->unsignedBigInteger('idAddress')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Xóa cột phone và idAddress khi rollback migration
            $table->dropColumn('phone');
            $table->dropColumn('idAddress');
        });
    }
};
