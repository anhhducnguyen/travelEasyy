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
            // Check if the column idAddress does not exist before adding it
            if (!Schema::hasColumn('users', 'idAddress')) {
                $table->string('idAddress', 15)->nullable()->after('phone');
                $table->foreign('idAddress')->references('idAddress')->on('tbladdress')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'idAddress')) {
                $table->dropForeign(['idAddress']);
                $table->dropColumn('idAddress');
            }
        });
    }
};
