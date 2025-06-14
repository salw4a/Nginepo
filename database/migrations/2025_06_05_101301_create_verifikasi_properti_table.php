<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifikasi_properti', function (Blueprint $table) {
            $table->string('id_verifikasi_properti')->primary();
            $table->string('nama_verifikasi_properti');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifikasi_properti');
    }
};
