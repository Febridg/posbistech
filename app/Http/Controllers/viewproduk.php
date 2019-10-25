<?php

namespace App\Http\Controllers;

use DB;

use Session;

use Illuminate\Support\Facades\File;

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
    
    public function editproduk($id)
    {
        $kategoriproduk = M_kategoriproduk::all();
        $produk = M_produk::where('id',$id)->first();
        
        return view('master.produk.editproduk',['kategoriproduk' => $kategoriproduk,'produk' => $produk]);
    }
    
    public function aksieditproduk($id,Request $request)
    {
        $tag = str_replace(" ","-",$request->nama);
        
        $filesatu = $request->file('gambar1');
        if (empty($filesatu)) {
            $gambar1 = $request->defaultgambar1;
        }else {
            File::delete('image/' . "$request->defaultgambar1");

            $gambar1 = $filesatu->getClientOriginalName();
            
            $lokasi = 'image';
            $filesatu->move($lokasi,$filesatu->getClientOriginalName());
        }
        
        $filedua = $request->file('gambar2');
        if (empty($filedua)) {
            $gambar2 = $request->defaultgambar2;
        }else {
            File::delete('image/' . "$request->defaultgambar2");

            $gambar2 = $filedua->getClientOriginalName();
            
            $lokasi = 'image';
            $filedua->move($lokasi,$filedua->getClientOriginalName());
        }
        
        $filetiga = $request->file('gambar3');
        if (empty($filetiga)) {
            $gambar3 = $request->defaultgambar3;
        }else {
            File::delete('image/' . "$request->defaultgambar3");

            $gambar3 = $filetiga->getClientOriginalName();
            
            $lokasi = 'image';
            $filetiga->move($lokasi,$filetiga->getClientOriginalName());
        }

        $produk = M_produk::find($id);
        $produk->nama = $request->nama;
        $produk->tag = $tag;
        $produk->deskripsi = $request->deskripsi;
        $produk->m_kategoriproduk_id = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stock = $request->stock;
        $produk->promo = $request->promo;
        $produk->gambar_satu = $gambar1;
        $produk->gambar_dua = $gambar2;
        $produk->gambar_tiga = $gambar3;
        $produk->aktif = $request->aktif;
        $produk->save();

        return redirect( env('APP_URL').'/produk/editproduk/'.$id)->with('statusprod','Data Produk berhasil diedit');
    }
}