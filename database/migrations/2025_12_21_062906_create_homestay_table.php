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
        Schema::create('homestay', function (Blueprint $table) {
            $table->id('homestay_id');
            $table->unsignedBigInteger('pemilik_warga_id');
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->text('fasilitas_json')->nullable();
            $table->decimal('harga_per_malam', 10, 2);
            $table->enum('status', ['tersedia', 'penuh', 'maintenance'])->default('tersedia');
            $table->string('media')->nullable();
            $table->timestamps();

            $table->foreign('pemilik_warga_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homestay');
    }
};