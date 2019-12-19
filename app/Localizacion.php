<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Localizacion extends Model
{
    use  SoftDeletes;
    protected $fillable = ['hospital', 'consulta'];
    //

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }


    public function getFullNameAttribute()
    {
        return $this->hospital .' '.$this->consulta;
    }
}
