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
        'nama_properti',
        'lokasi',
        'deskripsi',
        'harga_per_malam',
        'maksimum_tamu',
        'foto',
        'id_status_properti'
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }

    public function status()
    {
        return $this->belongsTo(StatusProperti::class, 'id_status_properti', 'id_status_properti');
    }

    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga_per_malam, 0, ',', '.');
    }
    public function kalender()
    {
        return $this->hasMany(KalenderKetersediaan::class, 'id_properti', 'id_properti');
    }
}
