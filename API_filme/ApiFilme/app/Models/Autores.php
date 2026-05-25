<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    protected $table = "Autores";

    protected $fillable = [
        'nome',
        'data_nascimento',
        'email',
        'telefone'
    ];

    public function produto(){
        return $this->hasMany(Filmes::class);
    }
}