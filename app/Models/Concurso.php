<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    protected $fillable = ['nome', 'descricao', 'data_inicio', 'data_fim', 'ativo'];

    public function assuntos()
    {
        return $this->hasMany(Assunto::class);
    }
}
