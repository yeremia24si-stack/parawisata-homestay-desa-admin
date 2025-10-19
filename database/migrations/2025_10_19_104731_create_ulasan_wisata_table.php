<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ulasan_wisata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warga_id')->nullable();
            $table->string('destinasi_id');
            $table->tinyInteger('rating');
            $table->text('komentar');
            $table->dateTime('waktu');
            $table->timestamps();

            $table->foreign('warga_id')->references('id')->on('warga')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasan_wisata');
    }
};
