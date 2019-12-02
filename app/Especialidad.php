<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //
    protected $fillable = ['name'];
    public function enfermedad()
    {
        return $this->hasMany('App\Enfermedad'); //cambiar a has many
    }

    public function medicos()
    {
        return $this->hasMany('App\Medico');
    }
}
