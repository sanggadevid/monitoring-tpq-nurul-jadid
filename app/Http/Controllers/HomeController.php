<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home Page',
            'user'  => Auth::User()->pengguna_nama,
        );

        // return view('index', $data);
         return view('home', $data);
    }
    
    public function admin()
    {
        $data = array(
            'title' => 'Home Admin',
            'user'  => Auth::User()->pengguna_nama,
        );

        // return view('index', $data);
         return view('home', $data);
    }

    public function guru()
    {
        $data = array(
            'title' => 'Home Guru',
            'user'  => Auth::User()->pengguna_nama,
        );

        // return view('index', $data);
         return view('home', $data);
    }

    public function walimurid()
    {
        $data = array(
            'title' => 'Home Wlai Murid',
            'user'  => Auth::User()->pengguna_nama,
        );

        // return view('index', $data);
         return view('home', $data);
    }
}
