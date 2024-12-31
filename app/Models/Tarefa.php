<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo', 'tipo_tarefa_id', 'descricao', 'meta_id'];

    public function concursos()
    {
        return $this->belongsToMany(Concurso::class);
    }

    public function meta()
    {
        return $this->belongsTo(Meta::class);
    }

    public function tipoTarefa()
    {
        return $this->belongsTo(TipoTarefa::class);
    }
}
