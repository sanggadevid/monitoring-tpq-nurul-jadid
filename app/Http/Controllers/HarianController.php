<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\HarianModel;
use App\Models\SantriModel;
use App\Models\WalimuridModel;
use Illuminate\Support\Facades\Auth;

class HarianController extends Controller
{
    public function index()
    {
    
        $nama =  Auth::user()->pengguna_nama;
        $wm =   DB::table('tbl_walimurid')
            ->select( 'tbl_walimurid.santri_id')
            ->where('tbl_walimurid.username', $nama)
            ->get();

            foreach ($wm as $d) {
              $d->santri_id;
                }

               
                $login = Auth::user()->pengguna_nama;
          
        $data = array(
            'title'        => 'Data Monitoring Harian',
            'data_guru'    => GuruModel::all(),
        

            'data_kelas'   => KelasModel::all(),
            'data_santri'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                                ->where('tbl_guru.guru_username', @$login)
                                ->get(),
             'data_santri_adm'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                        
                                ->get(),

            'data_all'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->get(),
            'data_adm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                         
                                ->get(),

            'data_wm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->get(),
                                
            
        );
// dd($data['data_all']);
 
         return view('admin.harian.list', $data);
    }


    public function detail($id)
    {

        $nama =  Auth::user()->pengguna_nama;
        $wm =   DB::table('tbl_walimurid')
            ->select( 'tbl_walimurid.santri_id')
            ->where('tbl_walimurid.username', $nama)
            ->get();

            foreach ($wm as $d) {
              $d->santri_id;
                }

                $login = Auth::user()->pengguna_nama; 

        $data = array(
            'title'        => 'Data Monitoring Harian',
            'data_guru'    => GuruModel::all(),
        
            'data_kelas'   => KelasModel::all(),
            'data_santri'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                                ->get(),

           'data_all'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),
          'data_adm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),

            'data_wm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),
            
        );

 
         return view('admin.harian.detail', $data);
    }


    public function store(Request $request, $id)
    {
        HarianModel::create([
            'santri_id'        =>  $id,
            'kelas_id'         => $request->kelas_id,
            'guru_id'          => $request->guru_id,
            'catatan_hari'     => $request->catatan_hari,
            'catatan_laporan'  => $request->catatan_laporan,
            'catatan_tgl'      => $request->catatan_tanggal,
      
        ]);

        return redirect('/harian')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        
        HarianModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'santri_id'        =>  $request->santri_id,
                        'kelas_id'         => $request->kelas_id,
                        'guru_id'          => $request->guru_id,
                        'catatan_hari'     => $request->catatan_hari,
                        'catatan_laporan'  => $request->catatan_laporan,
                        'catatan_tgl'      => $request->catatan_tanggal,
                     ]);

        return redirect('/harian')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(Request $request,$id)
    {

  
        HarianModel::where('id', $id)->delete();
        return redirect('/harian')->with('success', 'Data Berhasil Dihapus');
    }



    public function tambah($id)
    {
        $login = Auth::user()->pengguna_nama;
        $data = array(

            
            'title'        => 'Catatan Harian',
            'data_guru'  => DB::table('tbl_guru')
                        ->select('tbl_guru.*' )   
                        ->where('tbl_guru.guru_username', @$login)
                        ->get(),
             'data_guru_adm'  => DB::table('tbl_guru')
                        ->select('tbl_guru.*' )   
                 
                        ->get(),
            'data_kelas'   => KelasModel::all(),
            'data_santri'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                            ->select('tbl_santri.*', 'tbl_kelas.kelas_nama')
                                            ->where('tbl_santri.id', $id)
                                            ->get(),

            'data_all'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_santri.id', $id)
                                ->get(),
                         );

                
             return view('admin.harian.catatan', $data);
    }

    public function edit($id)
    {
        
        $nama =  Auth::user()->pengguna_nama;
        $wm =   DB::table('tbl_walimurid')
            ->select( 'tbl_walimurid.santri_id')
            ->where('tbl_walimurid.username', $nama)
            ->get();

            foreach ($wm as $d) {
              $d->santri_id;
                }

                $login = Auth::user()->pengguna_nama; 

        $data = array(
            'title'        => 'Data Monitoring Harian',
            'data_guru'  => DB::table('tbl_guru')
                            ->select('tbl_guru.*' )   
                            ->where('tbl_guru.guru_username', @$login)
                            ->get(),
            'data_guru_adm'  => DB::table('tbl_guru')
                        ->select('tbl_guru.*' )   
                        ->get(),
            'data_kelas'   => KelasModel::all(),
            'data_santri'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                                ->get(),

           'data_all'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),
          'data_adm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),

            'data_wm'     => DB::table('tbl_mtrharian')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrharian.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrharian.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrharian.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrharian.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->where('tbl_mtrharian.id', @$id)
                                ->get(),
            
        );


                
             return view('admin.harian.edit', $data);
    }



    
}
