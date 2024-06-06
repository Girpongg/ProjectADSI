<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaans';

    protected $fillable = ['id_murid', 'pertanyaan', 'jawaban','idmapel'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid', 'id');
    }
}
