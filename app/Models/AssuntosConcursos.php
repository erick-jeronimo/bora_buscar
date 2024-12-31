<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssuntosConcursos extends Model
{
    protected $fillable = ['assunto_id', 'concurso_id'];

    public function concurso()
    {
        return $this->belongsTo(Concurso::class);
    }

    public function assunto()
    {
        return $this->belongsTo(Assunto::class);
    }
}
