<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nome'];

    public function assuntos()
    {
        return $this->hasMany(Assunto::class);
    }
}
