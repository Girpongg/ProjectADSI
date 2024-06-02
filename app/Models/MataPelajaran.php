<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';
    protected $fillable = ['nama'];

    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'id_pelajaran', 'id');
    }
}
