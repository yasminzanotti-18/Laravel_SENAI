<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producoes extends Model
{
    protected $table = 'producoes';

    protected $fillable = [
        'nomeProduto',
        'materia_prima',
        'dataFabricacao',
        'quantidade',
        'preco',
    ];


}

?>