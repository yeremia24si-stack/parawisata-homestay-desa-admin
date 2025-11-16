<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->id('destinasi_id');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('alamat');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('jam_buka')->nullable();
            $table->decimal('tiket', 10, 2)->nullable();
            $table->string('kontak')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};
