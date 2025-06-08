<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properti', function (Blueprint $table) {
            $table->id('id_properti');
            $table->unsignedBigInteger('id_pemilik');
            $table->string('nama_properti');
            $table->text('lokasi');
            $table->text('deskripsi');
            $table->integer('harga_per_malam');
            $table->integer('maksimum_tamu');
            $table->unsignedBigInteger('id_status_properti');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemilik')->onDelete('cascade');
            $table->foreign('id_status_properti')->references('id_status_properti')->on('status_properti')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properti');
    }
};
