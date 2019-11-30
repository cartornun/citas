<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duracion extends Model
{
    protected $fillable = ['fecha_inicio','fecha_fin'];

    //
    public function cita()
    {
        return $this->belongsTo('App\Cita');
    }
}
