<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_supplier;

class viewsupplier extends Controller
{
    public function listsupplier()
    {

        $iduser = Session::get('iduser');
        $supplier = M_supplier::where('m_user_id',$iduser)->get();

        return view('master.supplier.listsupplier',['supplier' => $supplier]);
    }

    public function tambahsupplier()
    {
        return view('master.supplier.tambahsupplier');
    }

    public function aksitambahsupplier(Request $request)
    {
        if (empty($request->nama)) {
            $pesan .= "Nama Supplier,";
        }

        if (empty($request->alamat)) {
            $pesan .= "Alamat,";
        }

        if (empty($request->no_tlp)) {
            $pesan .= "Nomer Telepon,";
        }

        if (empty($request->nama) || empty($request->alamat) || empty($request->no_tlp)) {
            return redirect( env('APP_URL').'/supplier/tambahsupplier')->with('statussupplier','Kolom '. $pesan .' belum terisi');
        }else {
            M_modul::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_tlp' => $request->no_tlp,
                'email' => $request->email,
                'keterangan' => $request->keterangan
            ]);
    
            return redirect( env('APP_URL').'/supplier/tambahsupplier')->with('statussupplier','Data Supplier berhasil ditambahkan');
        }
    }

    public function editsupplier($id)
    {
        $supplier = M_supplier::find($id);

        return view('master.supplier.editsupplier',['supplier' => $supplier]);
    }
}