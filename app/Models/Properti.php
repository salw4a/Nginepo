<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;

    protected $table = 'properti';
    protected $primaryKey = 'id_properti';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pemilik',
        'id_verifikasi_properti',
        'id_status_properti',
        'nama_properti',
        'lokasi',
        'deskripsi',
        'harga_per_malam',
        'maksimum_tamu',
        'foto',
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }

    public function verifikasiProperti()
    {
        return $this->belongsTo(VerifikasiProperti::class, 'id_verifikasi_properti', 'id_verifikasi_properti');
    }

    public function statusProperti()
    {
        return $this->belongsTo(StatusProperti::class, 'id_status_properti', 'id_status_properti');
    }

    // Alias for backward compatibility
    public function status()
    {
        return $this->statusProperti();
    }

    public function verifikasi()
    {
        return $this->verifikasiProperti();
    }

    // Accessor for formatted price
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga_per_malam, 0, ',', '.');
    }
}
