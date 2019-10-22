<?php
namespace App\Helpers;

use DB;

use App\M_detailmodul;
use App\M_modul;
use App\M_menu;
use App\M_submenu;

class Detailmodul
{
    public static function get_menu($modul)
    {
        $menu = M_detailmodul::where('m_modul_id',$modul)->groupBy('m_menu_id')->orderBy('ordermenu')->get();
        
        return ($menu);
    }

    public static function get_submenu($menu,$modul)
    {
        $submenu = M_detailmodul::where('m_modul_id',$modul)->where('m_menu_id',$menu)->orderBy('ordersubmenu')->get();
        
        return ($submenu);
    }

    public static function cekmodul($modul)
    {
        $modul = M_detailmodul::where('m_modul_id',$modul);

        $cek = $modul->count();
        
        if ($cek>0) {
            $md = 1;
        }else {
            $md = 0;
        }

        return ($md);
    }

    public static function cekdetailmodul($modul,$menu,$submenu)
    {
        $modul = M_detailmodul::where('m_modul_id',$modul)->where('m_menu_id',$menu)->where('m_submenu_id',$submenu)->get();

        $cek = $modul->count();
        
        if ($cek>0) {
            $md = 1;
        }else {
            $md = 0;
        }

        return ($md);
    }
}