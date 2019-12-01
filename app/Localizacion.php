<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    protected $fillable = ['lugar'];
    //

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
}
