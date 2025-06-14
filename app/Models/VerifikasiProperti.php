<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiProperti extends Model
{
    use HasFactory;

    protected $table = 'verifikasi_properti';
    protected $primaryKey = 'id_verifikasi_properti';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_verifikasi_properti',
        'nama_verifikasi_properti',
    ];

    public function properti()
    {
        return $this->hasMany(Properti::class, 'id_verifikasi_properti', 'id_verifikasi_properti');
    }
}
