<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_submenu extends Model
{
    public function m_menus()
    {
        return $this->belongsTo('App\M_menu');
    }

    public function m_detailmoduls()
    {
        return $this->hasMany('App\M_detailmodul');
    }

    public function m_detailotoritis()
    {
        return $this->hasMany('App\M_detailotoriti');
    }
}