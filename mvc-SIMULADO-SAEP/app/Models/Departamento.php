<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
   protected $fillable = [
    'nome',
   'sigla',
   'orcamento',
   'data_criacao'
];

   public function funcionarios()
   {
       return $this->hasMany(Funcionario::class);
   }
}
