<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_detailotoriti extends Model
{
    protected $fillable = ['m_otoriti_id','m_menu_id','m_submenu_id','ordermenu','ordersubmenu'];

    public function m_otoritis()
    {
        return $this->belongsTo('App\M_otoriti','m_otoriti_id');
    }

    public function m_menus()
    {
        return $this->belongsTo('App\M_menu','m_menu_id');
    }

    public function m_submenus()
    {
        return $this->belongsTo('App\M_submenu','m_submenu_id');
    }

    public function m_users()
    {
        return $this->hasMany('App\M_user');
    }
}