<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    use HasFactory;
    protected $table = 'jadwal_kelas';
    protected $fillable = ['hari', 'id_pelajaran', 'id_guru', 'id_ruangkelas', 'jam_mulai', 'id_angkatan'];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_pelajaran', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }

    public function ruangKelas()
    {
        return $this->belongsTo(RuangKelas::class, 'id_ruangkelas', 'id');
    }
    public function angkatan(){
        return $this->belongsTo(TahunAngkatan::class, 'id_angkatan', 'id');
    }
    public function detailKelas()
    {
        return $this->belongsTo(DetailKelas::class, 'kelas_id');
    }
}
