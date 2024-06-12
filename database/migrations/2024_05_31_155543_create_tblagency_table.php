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
        Schema::create('tblagency', function (Blueprint $table) {
            $table->string('idAgency', 15)->primary();
            $table->string('idAddress', 15)->nullable();
            $table->string('name', 50)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('idTourGuide', 15)->nullable();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblagency');
    }
};
