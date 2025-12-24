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
        Schema::create('kamar_homestay', function (Blueprint $table) {
            $table->id('kamar_id');
            $table->unsignedBigInteger('homestay_id');
            $table->string('nama_kamar', 100);
            $table->integer('kapasitas');
            $table->text('fasilitas_json')->nullable();
            $table->decimal('harga', 10, 2);
            $table->string('media')->nullable();
            $table->timestamps();

            $table->foreign('homestay_id')->references('homestay_id')->on('homestay')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar_homestay');
    }
};