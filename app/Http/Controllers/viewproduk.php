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

    
}