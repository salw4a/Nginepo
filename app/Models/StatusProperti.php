<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProperti extends Model
{
    use HasFactory;

    protected $table = 'status_properti';
    protected $primaryKey = 'id_status_properti';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_status'
    ];

    public function properti()
    {
        return $this->hasMany(Properti::class);
    }
}
