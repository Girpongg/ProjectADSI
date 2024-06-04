<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadModul extends Model
{
    use HasFactory;
    protected $table = 'upload_moduls';
    protected $fillable = ['id_pelajaran', 'id_angkatan', 'materipelajaran', 'file'];
    public function pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_pelajaran');
    }
    public function kelas()
    {
        return $this->belongsTo(TahunAngkatan::class, 'id_angkatan');
    }

}
