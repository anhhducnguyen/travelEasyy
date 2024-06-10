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
        Schema::table('tblregister', function (Blueprint $table) {
            // Sửa tên cột idCustomer thành id
            $table->renameColumn('idCustomer', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblregister', function (Blueprint $table) {
            // Sửa lại tên cột id thành idCustomer khi rollback migration
            $table->renameColumn('id', 'idCustomer');
        });
    }
};
