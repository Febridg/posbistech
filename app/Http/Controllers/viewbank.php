<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_bank;

class viewbank extends Controller
{
    public function listbank()
    {
        $bank = M_bank::all();

        return view('master.bank.listbank',['bank' => $bank]);
    }

    public function tambahbank()
    {
        return view('master.bank.tambahbank');
    }

    public function aksitambahbank(Request $request)
    {
        if (empty($request->nama)) {
            $pesan .= "Nama Bank,";
        }

        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/bank/tambahbank')->with('statusbank','Kolom '. $pesan .' belum terisi');
        }else {
            M_bank::create([
                'nama' => $request->nama
            ]);
    
            return redirect( env('APP_URL').'/bank/tambahbank')->with('statusbank','Data Bank berhasil ditambahkan');
        }
    }

    public function editbank($id)
    {
        $bank = M_bank::find($id);

        return view('master.bank.editbank',['bank' => $bank]);
    }

    public function aksieditbank($id,Request $request)
    {
        if (empty($request->nama)) {
            $pesan .= "Nama Bank,";
        }

        if (empty($request->nama)) {
            return redirect( env('APP_URL').'/bank/editbank/'.$id)->with('statusbank','Kolom '. $pesan .' belum terisi');
        }else {
            $supplier = M_bank::find($id);
            $supplier->nama = $request->nama;
            $supplier->save();
    
            return redirect( env('APP_URL').'/bank/editbank/'.$id)->with('statusbank','Data Bank berhasil diedit');
        }
    }

    public function deletebank($id)
    {
        $bank = M_bank::find($id);
        $bank->delete();

        $bank = M_bank::all();

        return view('master.bank.listbank',['bank' => $bank]);
    }
}