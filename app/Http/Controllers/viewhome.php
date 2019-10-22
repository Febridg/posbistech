<?php

namespace App\Http\Controllers;

use Session;

use Illuminate\Http\Request;

use App\Http\Requests;

class viewhome extends Controller
{
    public function home()
    {
        if (Session::has('username')){
            //$menu = Menu::all();
            
            return view('home.home');
        }else{
            return view('login');
        }
        
    }
}