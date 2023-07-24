<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SantriModel;
use App\Models\KelasModel;
use App\Models\GuruModel;
class SantriController extends Controller
{
    public function index()
    {
        $data = array(
            'title'      => 'Data santri',
            'data_kelas' => KelasModel::all(),
            'data_guru' => GuruModel::all(),
            'data_santri'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                    ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                    ->select('tbl_santri.*', 'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                    ->get(),
            
        );

 
         return view('admin.santri.list', $data);
    }


    public function store(Request $request)
    {
        SantriModel::create([
            'kelas_id'           => $request->kelas_id,
            'guru_id'           => $request->guru_id,
            'santri_nis'         => $request->santri_nis,
            'santri_nama'        => $request->santri_nama,
            'santri_jk'          => $request->santri_jk,
            'santri_tmp_lhr'     => $request->santri_tmp_lhr,
            'santri_tgl_lhr'     => $request->santri_tgl_lhr,
            'santri_alamat'      => $request->santri_alamat,
        ]);

        return redirect('/santri')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        SantriModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'kelas_id'           => $request->kelas_id,
                        'guru_id'           => $request->guru_id,
                        'santri_nis'         => $request->santri_nis,
                        'santri_nama'        => $request->santri_nama,
                        'santri_jk'          => $request->santri_jk,
                        'santri_tmp_lhr'     => $request->santri_tmp_lhr,
                        'santri_tgl_lhr'     => $request->santri_tgl_lhr,
                        'santri_alamat'      => $request->santri_alamat,
                     ]);

        return redirect('/santri')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        SantriModel::where('id', $id)->delete();
        return redirect('/santri')->with('success', 'Data Berhasil Dihapus');
    }
}
