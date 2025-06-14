<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'tanggal_pembayaran','nomor_invoice', 'nama_properti',
        'tanggal_mulai', 'tanggal_selesai','total_harga','id_pengguna','id_status_pembayaran',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'total_harga' => 'decimal:2',
    ];

    public function statusPembayaran()
    {
        return $this->belongsTo(StatusPembayaran::class, 'id_status_pembayaran', 'id_status_pembayaran');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'id_transaksi', 'id_transaksi');
    }
}
