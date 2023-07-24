<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $data = array(
            'title'      => 'Data Guru',
            'data_kelas' => KelasModel::all(),
            'data_guru'  => GuruModel::join('tbl_kelas','tbl_kelas.id','=','tbl_guru.kelas_id')
                                    ->select('tbl_guru.*', 'tbl_kelas.kelas_nama')
                                    ->get(),
                                    
            
        );

 
         return view('admin.guru.list', $data);
    }


    public function store(Request $request)
    {
        $poto = $request->file('poto');
        $filename= date('Y-m-d').$poto->getClientOriginalName();
        $path = 'images/'.$filename;
        // dd(Storage::disk('public')->put($path, file_get_contents($poto)));
        Storage::disk('public')->put($path, file_get_contents($poto));
      
        GuruModel::create([
            'kelas_id'         => $request->kelas_id,
            'guru_password' => hash::make($request->guru_password),
            'guru_username'    => $request->guru_username,
            'guru_nama'        => $request->guru_nama,
            'guru_foto'        => $filename,
            'guru_jk'          => $request->guru_jk,
            'guru_ttl'         => $request->guru_ttl,
            'guru_alamat'      => $request->guru_alamat,
            'guru_jabatan'     => $request->guru_jabatan,
            'guru_nohp'        => $request->guru_nohp,
            'guru_email'       => $request->guru_email,
          
        ]);

        PenggunaModel::create([
            'pengguna_nama'     => $request->guru_username,
            'pengguna_email'    => uniqid(),
            'password'               => hash::make($request->password),
            'role'    => 'guru',
          
        ]);

        return redirect('/guru')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {

        if($poto = $request->file('poto')){
        $poto = $request->file('poto');
        $filename= date('Y-m-d').$poto->getClientOriginalName();
        $path = 'images/'.$filename;
        Storage::disk('public')->put($path, file_get_contents($poto));
        
        $img_path = public_path('images/'.$request->guru_foto);

        if(file_exists($img_path)){
            unlink($img_path);
        }
        
        }else{
           $filename  = $request->guru_foto;
        }

        
        GuruModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'kelas_id'          => $request->kelas_id,
                        'guru_password' => hash::make($request->guru_password),
                        'guru_username'    => $request->guru_username,
                        'guru_nama'        => $request->guru_nama,
                        'guru_foto'        => $filename,
                        'guru_jk'          => $request->guru_jk,
                        'guru_ttl'         => $request->guru_ttl,
                        'guru_alamat'      => $request->guru_alamat,
                        'guru_jabatan'     => $request->guru_jabatan,
                        'guru_nohp'        => $request->guru_nohp,
                        'guru_email'       => $request->guru_email,
                     ]);

        return redirect('/guru')->with('success', 'Data Berhasil Diupdate');
    }


    public function destroy($id)
    {
        GuruModel::where('id', $id)->delete();
        return redirect('/guru')->with('success', 'Data Berhasil Dihapus');
    }
}
