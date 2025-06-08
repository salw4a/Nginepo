<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    use HasFactory;
    protected $table = 'status_pembayaran';
    protected $primaryKey = 'id_status_pembayaran';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_status_pembayaran', 'warna_badge'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_status_pembayaran', 'id_status');
    }
}
