<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['nome', 'materia_id', 'assunto_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function assunto()
    {
        return $this->belongsTo(Assunto::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
