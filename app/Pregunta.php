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
        return $this->belongsTo(Tema::class, 'tema_id');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function borrarRespuestas()
    {
        $respuestas = $this->respuestas;
        foreach ($respuestas as $key => $respuesta) {
            $respuesta->delete();
            $respuesta->save();
        }
        return null;
    }
}
