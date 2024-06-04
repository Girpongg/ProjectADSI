<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKelas extends Model
{
    use HasFactory;

    protected $table = 'detail_kelas';

    protected $fillable = ['kelas_id', 'murid_id'];

    public function kelas()
    {
        return $this->hasMany(JadwalKelas::class, 'kelas_id');
    }
    public function murid()
    {
        return $this->hasMany(Murid::class, 'murid_id', 'id');
    }
    public function murids()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'id');
    }
}
