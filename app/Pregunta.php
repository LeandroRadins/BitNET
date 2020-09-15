<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Pregunta extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
