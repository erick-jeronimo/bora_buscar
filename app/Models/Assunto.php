<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $fillable = ['nome', 'descricao', 'materia_id'];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function concursos()
    {
        return $this->belongsToMany(Concurso::class);
    }

    public function metas()
    {
        return $this->hasMany(Meta::class);
    }
}
