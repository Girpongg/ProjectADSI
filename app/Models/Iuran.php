<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $table = 'iurans';
    protected $fillable = ['murid_id', 'nominal', 'tanggal', 'status'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'id');
    }
}
