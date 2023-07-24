<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PenggunaModel;

class SesiController extends Controller
{
    function index(){
       
        $data = [
            'title'      => 'Halaman Login',
                 ];

         return view('auth.login', $data);



         
    }


    public function logout(){
        Auth::logout();
        return redirect('');
    }


    public function login(Request $request)
    {
       
        $request->validate([
           'pengguna_nama' => 'required',
           'password' => 'required', 
        ],[
            'pengguna_nama.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',

        ]);

        $infoLogin = [
            'pengguna_nama'     => $request->pengguna_nama,
            'password' => $request->password
            
        ];


        if(Auth::attempt($infoLogin)){
        
            if(Auth::user()->role == 'admin'){
                return redirect('/home/admin');
            }else if(Auth::user()->role == 'guru'){
                return redirect('/home/guru');
            }else if(Auth::user()->role == 'walimurid'){
                return redirect('/home/walimurid');
            }
            
          
        }else{
            return redirect('')->withErrors('Username Dan Password yang dimasukan tidak sesuai')->withInput();
        }




       
        
    }
}
