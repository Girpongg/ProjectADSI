<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
    protected $fillable = ['nama'];

    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'id_guru', 'id');
    }

}
