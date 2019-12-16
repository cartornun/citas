<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    //
    use SoftDeletes;
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
