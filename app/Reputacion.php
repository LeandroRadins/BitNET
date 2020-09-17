<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reputacion extends Model
{
    protected $table="reputaciones";
    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class);
    }
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
