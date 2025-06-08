<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemilik', function (Blueprint $table) {
            $table->id('id_pemilik');
            $table->string('nama_pemilik');
            $table->string('kata_sandi');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->string('alamat');
            $table->string('foto_profil')->nullable();
            $table->integer('jumlah_properti')->default(0);
            $table->unsignedBigInteger('id_role');
            $table->timestamps();

            $table
            ->foreign('id_role')
            ->references('id_role')->on('role')
            ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemilik');
    }
};
