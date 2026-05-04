<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
   protected $fillable = [
       'nome',
       'sobrenome',
       'email',
       'cargo',
       'data_admissao',
       'salario',
       'departamento_id'
   ];

   public function departamentos()
   {
       return $this->belongsTo(Departamento::class);
   }

   public function dadosPessoais()
   {
       return $this->hasOne(DadosPessoais::class);
   }
}
