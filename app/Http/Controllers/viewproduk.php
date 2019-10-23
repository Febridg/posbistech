<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_kategoriproduk;

use App\M_produk;

class viewproduk extends Controller
{
    public function listproduk()
    {
        $produk = M_produk::where('m_user_id',Session::get('iduser'));

        return view('master.produk.listproduk',['produk' => $produk]);
    }

    public function tambahproduk()
    {
        $kategoriproduk = M_kategoriproduk::all();
        return view('master.produk.tambahproduk',['kategoriproduk' => $kategoriproduk]);
    }
    
    public function aksitambahproduk(Request $request)
    {
        $file = $request->file('gambar1');
        if (empty($file)) {
            $gambar1 = '0';
        }else {
            $gambar1 = $file->getClientOriginalName();
            
            $lokasi = 'gallery';
            $file->move($lokasi,$file->getClientOriginalName());
        }
        
        $file = $request->file('gambar2');
        if (empty($file)) {
            $gambar2 = '0';
        }else {
            $gambar2 = $file->getClientOriginalName();
            
            $lokasi = 'gallery';
            $file->move($lokasi,$file->getClientOriginalName());
        }
        
        $file = $request->file('gambar3');
        if (empty($file)) {
            $gambar3 = '0';
        }else {
            $gambar3 = $file->getClientOriginalName();
            
            $lokasi = 'gallery';
            $file->move($lokasi,$file->getClientOriginalName());
        }
        
        
    }
    
}
