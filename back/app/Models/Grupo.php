<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $fillable = [
        'nome',
       
 
    ];
    
    
    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
    
    public function campanhas()
    {
        return $this->hasMany(Campanha::class);
    }

    public function campanha_ativa()
    {
        return $this->belongsTo(Campanha::class);
    }
    
}
