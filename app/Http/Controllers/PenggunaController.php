<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Pengguna',
            'data_pengguna' => PenggunaModel::all(),
        );

 
         return view('admin.user.list', $data);
    }


    public function store(Request $request)
    {
        PenggunaModel::create([
            'pengguna_nama'     => $request->pengguna_nama,
            'pengguna_email'    => $request->pengguna_email,
            'password' => hash::make($request->password),
            'role'    => $request->role,
        ]);

        return redirect('/pengguna')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        PenggunaModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
            'pengguna_nama'     => $request->pengguna_nama,
            'pengguna_email'    => $request->pengguna_email,
            'password' => hash::make($request->password),
            'role'    => $request->role,
                     ]);

        return redirect('/pengguna')->with('success', 'Data Berhasil Diupdate');
    }


    public function destroy($id)
    {
        PenggunaModel::where('id', $id)->delete();
        return redirect('/pengguna')->with('success', 'Data Berhasil Dihapus');
    }
  
}
