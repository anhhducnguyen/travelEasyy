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
        Schema::create('tbladdress', function (Blueprint $table) {
            $table->string('idAddress', 15)->primary();
            $table->string('idCity', 15)->nullable();
            $table->string('idDistrict', 15)->nullable();
            $table->string('idWard', 15)->nullable();
            $table->string('idDetailAddress', 15)->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbladdress');
    }
};
