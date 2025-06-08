<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_status_pembayaran');
            $table->datetime('tanggal_pembayaran')->nullable();
            $table->string('nomor_invoice')->nullable();
            $table->string('nama_properti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('total_harga', 15, 2);
            $table->unsignedBigInteger('id_pengguna');
            $table->timestamps();

            $table->foreign('id_status_pembayaran')->references('id_status_pembayaran')->on('status_pembayaran');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
