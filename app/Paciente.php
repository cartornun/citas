<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name', 'surname', 'nuhsa','enfermedad_id'];


    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function enfermedad()
    {
        return $this->belongsTo('App\Enfermedad');
    }
    ##enfermedades-paciente

    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->surname;
    }

}
