<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_menu extends Model
{
    public function m_submenus()
    {
        return $this->hasMany('App\M_submenu')->orderBy('orders','asc');
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