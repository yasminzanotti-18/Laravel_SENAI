<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Produto extends model{
    protected $fillable = [
        'nome',
        'quantidade',
        'preco'
    ];
}



?>