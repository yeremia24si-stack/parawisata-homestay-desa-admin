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
        Schema::create('booking_homestay', function (Blueprint $table) {
            $table->id('booking_id');
            $table->unsignedBigInteger('kamar_id');
            $table->unsignedBigInteger('warga_id');
            $table->date('checkin');
            $table->date('checkout');
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->string('metode_bayar', 50)->nullable();
            $table->string('media')->nullable();
            $table->timestamps();

            $table->foreign('kamar_id')->references('kamar_id')->on('kamar_homestay')->onDelete('cascade');
            $table->foreign('warga_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_homestay');
    }
};