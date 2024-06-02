<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murids';
    protected $fillable = ['nama', 'alamat', 'id_angkatan'];

    public function tahunAngkatan()
    {
        return $this->hasMany(TahunAngkatan::class, 'id_angkatan', 'id');
    }
}
