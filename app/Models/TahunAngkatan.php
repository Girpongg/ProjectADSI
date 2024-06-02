<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAngkatan extends Model
{
    use HasFactory;
    protected $table = 'tahun_angkatans';
    protected $fillable = ['tahun_angkatan'];
    public function jadwalKelas()
    {
        return $this->hasMany(JadwalKelas::class, 'id_angkatan', 'id');
    }
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_angkatan', 'id');
    }
}
