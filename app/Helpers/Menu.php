<?php
namespace App\Helpers;

use DB;

use App\M_detailotoriti;
use App\M_detailmodul;
use App\M_otoriti;
use App\M_modul;
use App\M_menu;
use App\M_submenu;

class Menu
{
    public static function get_menu($otoriti,$modul,$userlogin)
    {
        if ($userlogin=='sysadmin') {
            $menu = M_detailmodul::where('m_modul_id',$modul)->groupBy('m_menu_id')->orderBy('ordermenu')->get();
        }else{
            $menu = M_detailotoriti::where('m_otoriti_id',$otoriti)->groupBy('m_menu_id')->orderBy('ordermenu')->get();
        }
        
        return ($menu);
    }

    public static function get_submenu($menu,$otoriti,$modul,$userlogin)
    {
        if ($userlogin=='sysadmin') {
            $submenu = M_detailmodul::where('m_modul_id',$modul)->where('m_menu_id',$menu)->orderBy('ordersubmenu')->get();
        }else{
            $submenu = M_detailotoriti::where('m_otoriti_id',$otoriti)->where('m_menu_id',$menu)->orderBy('ordersubmenu')->get();
        }
        
        return ($submenu);
    }
}