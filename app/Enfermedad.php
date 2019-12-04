<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $fillable = ['name','id_especialidad'];
    //
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }
    public function paciente()
    {
        return $this->hasMany('App\Paciente');
    }


}
