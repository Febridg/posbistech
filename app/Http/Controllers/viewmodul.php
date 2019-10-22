<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_modul;

use App\M_detailmodul;

use App\M_menu;

use App\M_submenu;

class viewmodul extends Controller
{
    public function listmodul()
    {
        $modul = M_modul::orderBy('id','desc')->get();
        $detailmodul = M_detailmodul::groupBy('m_modul_id')->orderBy('m_modul_id','desc')->get();

        return view('master.modul.listmodul',['modul' => $modul,'detailmodul' => $detailmodul]);
    }

    public function tambahmodul()
    {
        return view('master.modul.tambahmodul');
    } 

    public function tambahdetailmodul()
    {
        $modul = M_modul::orderBy('id','desc')->get();
        $menu = M_menu::all();

        return view('master.modul.tambahdetailmodul',['modul' => $modul,'menu' => $menu]);
    }

    public function aksitambahmodul(Request $request)
    {
        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/modul/tambahmodul')->with('statusmodul','Kolom nama belum terisi');
        }else {
            M_modul::create([
                'nama' => $request->nama
            ]);
    
            return redirect( env('APP_URL').'/modul/tambahmodul')->with('statusmodul','Modul berhasil ditambahkan');
        }
    }

    public function aksitambahdetailmodul(Request $request)
    {
        if ($request->modul==0) {
            return redirect( env('APP_URL').'/modul/tambahdetailmodul')->with('statusdetailmodul','Kolom modul belum terisi');
        }else {
            $menu = M_menu::all();
            foreach ($menu as $mn) {
                foreach ($mn->m_submenus as $smn) {
                    $idmenu = $mn->id;
                    $idsubmenu = $smn->id;
                    if ($request->input("sm$idmenu$idsubmenu")==$smn->id) {
                        M_detailmodul::create([
                            'm_modul_id' => $request->modul,
                            'm_menu_id' => $mn->id,
                            'm_submenu_id' => $smn->id,
                            'ordermenu' => $mn->orders,
                            'ordersubmenu' => $smn->orders
                        ]);
                    }
                }
            }
    
            return redirect( env('APP_URL').'/modul/tambahdetailmodul')->with('statusmodul','Detail Modul berhasil ditambahkan');
        }
    }

    public function editmodul($id)
    {
        $modul = M_modul::find($id);

        return view('master.modul.editmodul',['modul' => $modul]);
    }

    public function aksieditmodul($id,Request $request)
    {
        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/modul/editmodul/'.$id)->with('statusmodul','Kolom nama belum terisi');
        }else {
            $modul = M_modul::find($id);
            $modul->nama = $request->nama;
            $modul->save();
    
            return redirect( env('APP_URL').'/modul/editmodul/'.$id)->with('statusmodul','Modul berhasil diedit');
        }

    }

    public function editdetailmodul($id)
    {

        $modul = M_modul::where('id',$id)->first();
        $menu = M_menu::all();

        return view('master.modul.editdetailmodul',['modul' => $modul,'menu' => $menu]);
    }

    public function aksieditdetailmodul($id,Request $request)
    {
        $detailmodul = M_detailmodul::where('m_modul_id',$id);
        $detailmodul->delete();

        $menu = M_menu::all();
            foreach ($menu as $mn) {
                foreach ($mn->m_submenus as $smn) {
                    $idmenu = $mn->id;
                    $idsubmenu = $smn->id;
                    if ($request->input("sm$idmenu$idsubmenu")==$smn->id) {
                        M_detailmodul::create([
                            'm_modul_id' => $id,
                            'm_menu_id' => $mn->id,
                            'm_submenu_id' => $smn->id,
                            'ordermenu' => $mn->orders,
                            'ordersubmenu' => $smn->orders
                        ]);
                    }
                }
            }
    
        return redirect( env('APP_URL').'/modul/editdetailmodul/'.$id)->with('statusmodul','Detail Modul berhasil di edit');
    }

    public function deletemodul($id)
    {
        $modul = M_modul::find($id);
        $modul->delete();

        $detailmodul = M_detailmodul::where('m_modul_id',$id);
        $detailmodul->delete();

        $modul = M_modul::orderBy('id','desc')->get();
        $detailmodul = M_detailmodul::groupBy('m_modul_id')->orderBy('m_modul_id','desc')->get();

        return view('master.modul.listmodul',['modul' => $modul,'detailmodul' => $detailmodul]);
    }

    public function deletedetailmodul($id)
    {
        $detailmodul = M_detailmodul::where('m_modul_id',$id);
        $detailmodul->delete();

        $modul = M_modul::orderBy('id','desc')->get();
        $detailmodul = M_detailmodul::groupBy('m_modul_id')->orderBy('m_modul_id','desc')->get();

        return view('master.modul.listmodul',['modul' => $modul,'detailmodul' => $detailmodul]);
    }
}