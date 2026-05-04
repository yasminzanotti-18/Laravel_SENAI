<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadosPessoais extends Model
{
   protected $table = 'DadosPessoais';

   protected $fillable = [
       'cpf',
       'rg',
       'data_nascimento',
       'cep',
       'funcionario_id'
   ];

   public function funcionario()
   {
       return $this->belongsTo(Funcionario::class);
   }
}
