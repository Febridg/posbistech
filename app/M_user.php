<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_user extends Model
{
    public function m_datausers()
    {
        return $this->hasOne('App\M_datauser');
    }

    public function m_otoritis()
    {
        return $this->belongsTo('App\M_otoriti');
    }
}