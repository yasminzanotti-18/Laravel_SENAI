<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model{

    protected $table = 'editora'; 

    protected $fillable = [
        'nomeEditora',
        'cnpj',
        'pais',
        'cidade'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}