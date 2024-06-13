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
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('idBooking', 15)->primary();
            $table->unsignedBigInteger('idUser')->nullable();
            $table->string('idTour', 15)->nullable();
            $table->integer('quantityTicket')->nullable();
            $table->string('idAgency', 15)->nullable(); // Đại lý (nếu có)
            $table->enum('confirmation_status', ['waiting_for_admin', 'confirmed'])->default('waiting_for_admin'); // Trạng thái xác nhận
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid'); // Trạng thái thanh toán
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
