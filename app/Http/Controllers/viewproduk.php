<?php

namespace App\Http\Controllers;

use DB;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_kategoriproduk;

use App\M_produk;

class viewproduk extends Controller
{
    public function listproduk()
    {

        $iduser = Session::get('iduser');
        $produk = M_produk::where('m_user_id',$iduser)->get();

        return view('master.produk.listproduk',['produk' => $produk]);
    }

    public function tambahproduk()
    {
        $kategoriproduk = M_kategoriproduk::all();
        return view('master.produk.tambahproduk',['kategoriproduk' => $kategoriproduk]);
    }
    
    public function aksitambahproduk(Request $request)
    {
        $iduser = Session::get('iduser');
        $tag = str_replace(" ","-",$request->nama);
        
        $filesatu = $request->file('gambar1');
        if (empty($filesatu)) {
            $gambar1 = '0';
        }else {
            $gambar1 = $filesatu->getClientOriginalName();
            
            $lokasi = 'image';
            $filesatu->move($lokasi,$filesatu->getClientOriginalName());
        }
        
        $filedua = $request->file('gambar2');
        if (empty($filedua)) {
            $gambar2 = '0';
        }else {
            $gambar2 = $filedua->getClientOriginalName();
            
            $lokasi = 'image';
            $filedua->move($lokasi,$filedua->getClientOriginalName());
        }
        
        $filetiga = $request->file('gambar3');
        if (empty($filetiga)) {
            $gambar3 = '0';
        }else {
            $gambar3 = $filetiga->getClientOriginalName();
            
            $lokasi = 'image';
            $filetiga->move($lokasi,$filetiga->getClientOriginalName());
        }
        
        M_produk::create([
    		'm_user_id' => $iduser,
            'nama' => $request->nama,
            'tag' => $tag,
            'deskripsi' => $request->deskripsi,
            'm_kategoriproduk_id' => $request->kategori,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'promo' => $request->promo,
            'gambar_satu' => $gambar1,
            'gambar_dua' => $gambar2,
            'gambar_tiga' => $gambar3,
            'aktif' => $request->aktif
        ]);
        
        return redirect( env('APP_URL').'/produk/tambahproduk')->with('statusprod','Data Produk berhasil ditambahkan');
    }
    
}