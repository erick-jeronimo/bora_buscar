<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTarefa extends Model
{
    protected $fillable = ['nome'];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
