<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('status_properti', function (Blueprint $table) {
            $table->id('id_status_properti');
            $table->string('nama_status_properti');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status_properti');
    }
};
