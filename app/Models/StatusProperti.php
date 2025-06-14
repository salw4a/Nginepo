<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProperti extends Model
{
    use HasFactory;

    protected $table = 'status_properti';
    protected $primaryKey = 'id_status_properti';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_status_properti',
        'nama_status_properti',
    ];

    public function properti()
    {
        return $this->hasMany(Properti::class, 'id_status_properti', 'id_status_properti');
    }
}
