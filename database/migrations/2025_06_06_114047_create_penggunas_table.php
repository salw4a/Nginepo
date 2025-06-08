<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('kata_sandi');
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto_profil')->nullable();
            $table->unsignedBigInteger('id_role');
            $table->timestamps();

            $table
            ->foreign('id_role')
            ->references('id_role')->on('role')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
};
