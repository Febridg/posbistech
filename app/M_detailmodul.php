<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_detailmodul extends Model
{
    protected $fillable = ['m_modul_id','m_menu_id','m_submenu_id','ordermenu','ordersubmenu'];

    public function m_moduls()
    {
        return $this->belongsTo('App\M_modul','m_modul_id');
    }

    public function m_menus()
    {
        return $this->belongsTo('App\M_menu','m_menu_id');
    }

    public function m_submenus()
    {
        return $this->belongsTo('App\M_submenu','m_submenu_id');
    }
}