<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_role'];

    public function pemilik(){
        return $this->hasMany(Pemilik::class, 'id_role', 'id_role');
    }

    public function pengguna(){
        return $this->hasMany(Pengguna::class, 'id_role', 'id_role');
    }
}
