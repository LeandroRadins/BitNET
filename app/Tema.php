<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tema extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}
