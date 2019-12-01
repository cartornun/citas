<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cita extends Model
{
    protected $fillable = ['medico_id', 'paciente_id', 'localizacion_id']; //añadido localizacion_id

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function localizacion()
    {
        return $this->belongsTo('App\Localizacion');
    }
    public function duracion() //quitar esto
    {
        return $this->hasOne('App\Duracion');
    }


}
