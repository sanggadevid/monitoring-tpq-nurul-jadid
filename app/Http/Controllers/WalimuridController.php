<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SantriModel;
use App\Models\WalimuridModel;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\Hash;

class WalimuridController extends Controller
{
    public function index()
    {
        $data = array(
            'title'      => 'Data Wali Murid',
            'data_santri' => SantriModel::all(),
            'data_walimurid'  => WalimuridModel::join('tbl_santri','tbl_santri.id','=','tbl_walimurid.santri_id')
                                    ->select('tbl_walimurid.*', 'tbl_santri.santri_nama')
                                    ->get(),
            
        );

 
         return view('admin.walimurid.list', $data);
    }


    public function store(Request $request)
    {
        WalimuridModel::create([
            'santri_id'               => $request->santri_id,
            'password'    => hash::make($request->password),
            'username'    => $request->username,
            'walimurid_nama'        => $request->walimurid_nama,
            'walimurid_jk'          => $request->walimurid_jk,
            'walimurid_tmp_lhr'      => $request->walimurid_tmp_lhr,
            'walimurid_tgl_lhr'      => $request->walimurid_tgl_lhr,
            'walimurid_email'        => $request->walimurid_email,
            'walimurid_tlp'          => $request->walimurid_tlp,
            'walimurid_alamat'       => $request->walimurid_alamat,
          
        ]);

        PenggunaModel::create([
            'pengguna_nama'     => $request->username,
            'pengguna_email'    => uniqid(),
            'password'               => hash::make($request->password),
            'role'    => 'walimurid',
          
        ]);

        return redirect('/walimurid')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        WalimuridModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'santri_id'               => $request->santri_id,
                        'password'    => hash::make($request->password),
                        'username'    => $request->username,
                        'walimurid_nama'        => $request->walimurid_nama,
                        'walimurid_jk'          => $request->walimurid_jk,
                        'walimurid_tmp_lhr'      => $request->walimurid_tmp_lhr,
                        'walimurid_tgl_lhr'      => $request->walimurid_tgl_lhr,
                        'walimurid_email'        => $request->walimurid_email,
                        'walimurid_tlp'          => $request->walimurid_tlp,
                        'walimurid_alamat'       => $request->walimurid_alamat,
                     ]);

        return redirect('/walimurid')->with('success', 'Data Berhasil Diupdate');
    }


    public function destroy($id)
    {
        WalimuridModel::where('id', $id)->delete();
        return redirect('/walimurid')->with('success', 'Data Berhasil Dihapus');
    }
}
