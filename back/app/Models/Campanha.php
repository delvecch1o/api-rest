<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    use HasFactory;
    protected $table = 'campanhas';
    protected $fillable = [
        'nome',
        'descricao',

    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }
       
}
