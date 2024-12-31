<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorasDiarias extends Model
{
    protected $fillable = ['nome', 'descricao', 'valor'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
