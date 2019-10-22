<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\M_user;

use App\M_datauser;

class aksilogin extends Controller
{
    public function login(Request $request)
    {
        $password = md5($request->password);

        $m_user = M_user::where('username',$request->username)
                                ->where('password',$password)
                                ->first();

        $cek = $m_user->count();

        if ($cek>0) {
            Session::put('username',$m_user->username);
            Session::put('iduser',$m_user->id);
        }

        return redirect(env('APP_URL').'/');
    }
}