<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nome', 'data_nascimento',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
