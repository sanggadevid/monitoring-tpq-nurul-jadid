<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;

class KelasController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Kelas',
            'data_kelas' => KelasModel::all(),
        );

 
         return view('admin.kelas.list', $data);
    }


    public function store(Request $request)
    {
        KelasModel::create([
            'kelas_nama'     => $request->kelas_nama,
          
        ]);

        return redirect('/kelas')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        KelasModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
            'kelas_nama'     => $request->kelas_nama,
                     ]);

        return redirect('/kelas')->with('success', 'Data Berhasil Diupdate');
    }


    public function destroy($id)
    {
        KelasModel::where('id', $id)->delete();
        return redirect('/kelas')->with('success', 'Data Berhasil Dihapus');
    }
  
}
