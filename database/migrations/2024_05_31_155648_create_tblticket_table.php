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
        Schema::create('tblticket', function (Blueprint $table) {
            $table->string('idTicket', 15)->primary();
            $table->string('idTour', 15)->nullable();
            $table->string('idCustomer', 15)->nullable();
            $table->string('idAgency', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblticket');
    }
};
