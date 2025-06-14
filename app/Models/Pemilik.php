<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Properti;


/**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Properti[] $properti
 */
class Pemilik extends Authenticatable
{
    use HasFactory;

    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'telepon',
        'alamat',
        'foto_profil',
        'jumlah_properti',
        'id_role'
    ];
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
    public function role(){
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properti(){
        return $this->hasMany(Properti::class, 'id_pemilik', 'id_pemilik');
    }
}
