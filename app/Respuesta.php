<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respuesta extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function reputaciones()
    {
        return $this->hasMany(Reputacion::class);
    }
}
