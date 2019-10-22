<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_modul extends Model
{
    protected $fillable = ['nama'];

    public function m_otoritis()
    {
        return $this->hasMany('App\M_otoriti');
    }

    public function m_detailmoduls()
    {
        return $this->hasMany('App\M_detailmodul');
    }
}