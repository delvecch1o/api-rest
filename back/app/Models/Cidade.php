<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidades';
    protected $fillable = [
        'municipio',
        'estado',
        'pais',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
