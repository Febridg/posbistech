<?php
namespace App\Helpers;

use DB;

use App\M_detailotoriti;
use App\M_detailmodul;
use App\M_otoriti;
use App\M_modul;
use App\M_menu;
use App\M_submenu;

class Detailotoriti
{
    public static function get_menu($otoriti)
    {
        $menu = M_detailotoriti::where('m_otoriti_id',$otoriti)->groupBy('m_menu_id')->orderBy('ordermenu')->get();
        
        return ($menu);
    }

    public static function get_submenu($menu,$otoriti)
    {
        $submenu = M_detailotoriti::where('m_otoriti_id',$otoriti)->where('m_menu_id',$menu)->orderBy('ordersubmenu')->get();
        
        return ($submenu);
    }

    public static function cekotoriti($otoriti)
    {
        $otoriti = M_detailotoriti::where('m_otoriti_id',$otoriti);

        $cek = $otoriti->count();
        
        if ($cek>0) {
            $ot = 1;
        }else {
            $ot = 0;
        }

        return ($ot);
    }

    public static function cekdetailotoriti($otoriti,$menu,$submenu)
    {
        $otoriti = M_detailotoriti::where('m_otoriti_id',$otoriti)->where('m_menu_id',$menu)->where('m_submenu_id',$submenu)->get();

        $cek = $otoriti->count();
        
        if ($cek>0) {
            $ot = 1;
        }else {
            $ot = 0;
        }

        return ($ot);
    }
}