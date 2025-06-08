<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderKetersediaan extends Model
{
    use HasFactory;
    protected $table = 'kalender_ketersediaan';
    protected $primaryKey = 'id_kalender';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kalender',
        'id_properti',
        'tanggal',
        'tersedia'
    ];

    public function properti()
    {
        return $this->belongsTo(Properti::class, 'id_properti', 'id_properti');
    }
}
