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
}