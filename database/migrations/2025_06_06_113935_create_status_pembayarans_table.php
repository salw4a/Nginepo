<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status_pembayaran', function (Blueprint $table) {
            $table->id('id_status_pembayaran');
            $table->string('nama_status_pembayaran');
            $table->string('warna_badge')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_pembayaran');
    }
};
