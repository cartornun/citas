<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enfermedad extends Model
{
    use  SoftDeletes;
    protected $fillable = ['name','especialidad_id'];
    //
    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }
    public function paciente()
    {
        return $this->hasMany('App\Paciente');
    }

    public function getName(){
        return $this->name;
    }


}

