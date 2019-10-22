<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_modul;

use App\M_detailmodul;

use App\M_menu;

use App\M_submenu;

use App\M_otoriti;

use App\M_detailotoriti;

class viewotoritas extends Controller
{
    public function listotoritas()
    {
        $otoriti = M_otoriti::orderBy('id','desc')->get();
        $detailotoriti = M_detailotoriti::groupBy('m_otoriti_id')->orderBy('m_otoriti_id','desc')->get();

        return view('master.otoritas.listotoritas',['otoriti' => $otoriti,'detailotoriti' => $detailotoriti]);
    }

    public function tambahotoritas()
    {
        $modul = M_modul::orderBy('nama')->get();

        return view('master.otoritas.tambahotoritas',['modul' => $modul]);
    }

    public function aksitambahotoritas(Request $request)
    {
        if (empty($request->nama) || $request->modul==0) {
            return redirect( env('APP_URL').'/otoritas/tambahotoritas')->with('statusotoritas','Ada kolom belum terisi');
        }else {
            M_otoriti::create([
                'nama' => $request->nama,
                'm_modul_id' => $request->modul
            ]);
    
            return redirect( env('APP_URL').'/otoritas/tambahotoritas')->with('statusotoritas','Otoritas baru berhasil ditambahkan');
        }
    }

    public function editotoritas($id)
    {
        $otoritas = M_otoriti::find($id);

        return view('master.otoritas.editotoritas',['otoritas' => $otoritas]);
    }

    public function aksieditotoritas($id,Request $request)
    {
        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/otoritas/editotoritas/'.$id)->with('statusotoritas','Kolom nama tidak terisi');
        }else {
            $otoritas = M_otoriti::find($id);
            $otoritas->nama = $request->nama;
            $otoritas->save();
    
            return redirect( env('APP_URL').'/otoritas/editotoritas/'.$id)->with('statusotoritas','Otoritas berhasil diedit');
        }
    }

    public function tambahdetailotoritas()
    {
        $otoritas = M_otoriti::orderBy('id','desc')->get();

        return view('master.otoritas.tambahdetailotoritas',['otoritas' => $otoritas]);
    }

    public function menutambahdetailotoritas($id)
    {
        $otoritas = M_otoriti::find($id);

        return view('master.otoritas.menutambahdetailotoritas',['otoritas' => $otoritas]);
    }

    public function aksitambahdetailotoritas(Request $request)
    {
        if ($request->otoritas==0) {
            return redirect( env('APP_URL').'/otoritas/tambahdetailotoritas')->with('statusdetailotoritas','Kolom nama otoritas belum terisi');
        }else {
            $otoritas = M_otoriti::find($request->otoritas);

            $menu = M_detailmodul::where('m_modul_id',$otoritas->m_modul_id)->groupBy('m_menu_id')->orderBy('ordermenu')->get();

            foreach ($menu as $mn) {
                $submenu = M_detailmodul::where('m_modul_id',$otoritas->m_modul_id)->where('m_menu_id',$mn->m_menu_id)->orderBy('ordersubmenu')->get();
                foreach ($submenu as $smn) {
                    $idmenu = $mn->m_menu_id;
                    $idsubmenu = $smn->m_submenu_id;
                    if ($request->input("sm$idmenu$idsubmenu")==$smn->m_submenu_id) {
                        M_detailotoriti::create([
                            'm_otoriti_id' => $request->otoritas,
                            'm_menu_id' => $mn->m_menu_id,
                            'm_submenu_id' => $smn->m_submenu_id,
                            'ordermenu' => $mn->ordermenu,
                            'ordersubmenu' => $smn->ordersubmenu
                        ]);
                    }
                }
            }
    
            return redirect( env('APP_URL').'/otoritas/tambahdetailotoritas')->with('statusdetailotoritas','Detail otoritas berhasil ditambahkan');
        }
    }

    public function editdetailotoritas($id)
    {
        $otoritas = M_otoriti::where('id',$id)->first();

        return view('master.otoritas.editdetailotoritas',['otoritas' => $otoritas]);
    }

    public function aksieditdetailotoritas($id,Request $request)
    {
        $detailotoritas = M_detailotoriti::where('m_otoriti_id',$id);
        $detailotoritas->delete();

            $otoritas = M_otoriti::find($id);

            $menu = M_detailmodul::where('m_modul_id',$otoritas->m_modul_id)->groupBy('m_menu_id')->orderBy('ordermenu')->get();

            foreach ($menu as $mn) {
                $submenu = M_detailmodul::where('m_modul_id',$otoritas->m_modul_id)->where('m_menu_id',$mn->m_menu_id)->orderBy('ordersubmenu')->get();
                foreach ($submenu as $smn) {
                    $idmenu = $mn->m_menu_id;
                    $idsubmenu = $smn->m_submenu_id;
                    if ($request->input("sm$idmenu$idsubmenu")==$smn->m_submenu_id) {
                        M_detailotoriti::create([
                            'm_otoriti_id' => $id,
                            'm_menu_id' => $mn->m_menu_id,
                            'm_submenu_id' => $smn->m_submenu_id,
                            'ordermenu' => $mn->ordermenu,
                            'ordersubmenu' => $smn->ordersubmenu
                        ]);
                    }
                }
            }
    
        return redirect( env('APP_URL').'/otoritas/editdetailotoritas/'.$id)->with('statusdetailotoritas','Detail otoritas berhasil di edit');
    }

    public function deleteotoritas($id)
    {
        $otoritas = M_otoriti::find($id);
        $otoritas->delete();

        $detailotoritas = M_detailotoriti::where('m_otoriti_id',$id);
        $detailotoritas->delete();

        $otoriti = M_otoriti::orderBy('id','desc')->get();
        $detailotoriti = M_detailotoriti::groupBy('m_otoriti_id')->orderBy('m_otoriti_id','desc')->get();

        return view('master.otoritas.listotoritas',['otoriti' => $otoriti,'detailotoriti' => $detailotoriti]);
    }

    public function deletedetailotoritas($id)
    {
        $detailotoritas = M_detailotoriti::where('m_otoriti_id',$id);
        $detailotoritas->delete();

        $otoriti = M_otoriti::orderBy('id','desc')->get();
        $detailotoriti = M_detailotoriti::groupBy('m_otoriti_id')->orderBy('m_otoriti_id','desc')->get();

        return view('master.otoritas.listotoritas',['otoriti' => $otoriti,'detailotoriti' => $detailotoriti]);
    }
}