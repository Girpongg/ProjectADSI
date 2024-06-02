<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;
    protected $table = 'ruang_kelas';
    protected $fillable = ['nama', 'kapasitas'];

    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'id_ruang_kelas', 'id');
    }
}
