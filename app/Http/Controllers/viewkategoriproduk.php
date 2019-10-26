<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_kategoriproduk;

class viewkategoriproduk extends Controller
{
    public function listkategoriproduk()
    {
        $iduser = Session::get('iduser');
        $kategoriproduk = M_kategoriproduk::where('m_user_id',$iduser)->get();

        return view('master.kategoriproduk.listkategoriproduk',['kategoriproduk' => $kategoriproduk]);
    }

    public function tambahkategoriproduk()
    {
        return view('master.kategoriproduk.tambahkategoriproduk');
    }

    public function aksitambahkategoriproduk(Request $request)
    {
        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/kategoriproduk/tambahkategoriproduk')->with('statuskategoriprod','Kolom nama belum terisi');
        }else {
            $iduser = Session::get('iduser');
            
            M_kategoriproduk::create([
                'm_user_id' => $iduser,
                'nama' => $request->nama
            ]);
    
            return redirect( env('APP_URL').'/kategoriproduk/tambahkategoriproduk')->with('statuskategoriprod','Kategori Produk berhasil ditambahkan');
        }
    }

    public function editkategoriproduk($id)
    {
        $kategoriproduk = M_kategoriproduk::find($id);

        return view('master.kategoriproduk.editkategoriproduk',['kategoriproduk' => $kategoriproduk]);
    }

    public function aksieditkategoriproduk($id,Request $request)
    {
        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/kategoriproduk/editkategoriproduk/'.$id)->with('statuskategoriprod','Kolom nama belum terisi');
        }else {
            $kategoriproduk = M_kategoriproduk::find($id);
            $kategoriproduk->nama = $request->nama;
            $kategoriproduk->save();
    
            return redirect( env('APP_URL').'/kategoriproduk/editkategoriproduk/'.$id)->with('statuskategoriprod','Kategori Produk berhasil diedit');
        }
    }

    public function deletekategoriproduk($id)
    {
        $kategoriproduk = M_kategoriproduk::find($id);
        $kategoriproduk->delete();

        $iduser = Session::get('iduser');
        $kategoriproduk = M_kategoriproduk::where('m_user_id',$iduser)->get();

        return view('master.kategoriproduk.listkategoriproduk',['kategoriproduk' => $kategoriproduk]);
    }
}
