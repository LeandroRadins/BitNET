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

    public function interaccionUsuarios()
    {
        $preguntas = $this->preguntas;
        if(count($preguntas)>0){
            $usuarios = collect();
            foreach ($preguntas as $key => $pregunta) {
                $usuarios->push($pregunta->autor);
            }
            $usuarios = $usuarios->unique('id');
            return count($usuarios);
        }else{
            return 0;
        }
    }
}
