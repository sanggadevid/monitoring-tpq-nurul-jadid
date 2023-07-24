<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\SantriModel;
use App\Models\BulananModel;
use Illuminate\Support\Facades\Auth;

class BulananController extends Controller
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
            'title'        => 'Data Monitoring Bulanan',
            'data_guru'    => GuruModel::all(),
            'data_santri_adm'  => DB::table('tbl_santri')
                            ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                            ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                            ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                    
                            ->get(),
            'data_kelas'   => KelasModel::all(),
            'data_santri'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                                ->where('tbl_guru.guru_username', @$login)
                                ->get(),


            'data_all'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->get(),
           'data_adm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                        
                                ->get(),
            'data_wm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->get(),
            
        );

 
         return view('admin.bulanan.list', $data);
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
            'title'        => 'Data Monitoring Bulanan',
            'data_guru'    => GuruModel::all(),
        
            'data_kelas'   => KelasModel::all(),
            'data_santri'  => DB::table('tbl_santri')
                                ->join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                ->join('tbl_guru','tbl_guru.id','=','tbl_santri.guru_id')
                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama' )   
                                ->get(),

            'data_all'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
            'data_adm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
                              
            'data_wm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
            
        );

 
         return view('admin.bulanan.detail', $data);
    }


    public function store(Request $request, $id)
    {
        
        // dd($request->All());
        BulananModel::create([
            'santri_id'              =>  $id,
            'kelas_id'               => $request->kelas_id,
            'guru_id'                => $request->guru_id,
            'mtrbulanan_tgl'         => $request->mtrbulanan_tgl,
            'mtrbulanan_sholat'      => $request->mtrbulanan_sholat,
            'mtrbulanan_doa_harian'  => $request->mtrbulanan_doa_harian,
            'mtrbulanan_surah_pendek'=> $request->mtrbulanan_surah_pendek,
            'mtrbulanan_quran'       => $request->mtrbulanan_quran,
            'list_sholat'            => $request->list_sholat,
            'list_doa_harian'        => $request->list_doa_harian,
            'list_surah_pendek'      => $request->list_surah_pendek,
            'list_quran'             => $request->list_quran,
            'nilai_solat'            => $request->nilai_solat,
            'nilai_doa_harian'       => $request->nilai_doa_harian,
            'nilai_surah_pendek'     => $request->nilai_surah_pendek,
            'nilai_quran'            => $request->nilai_quran,
           
    
        ]);

        return redirect('/bulanan')->with('success', 'Data Berhasil Disimpan');
        
    }

    public function update(Request $request, $id)
    {
        BulananModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'santri_id'              => $request->santri_id,
                        'kelas_id'               => $request->kelas_id,
                        'guru_id'                => $request->guru_id,
                        'mtrbulanan_tgl'         => $request->mtrbulanan_tgl,
                        'mtrbulanan_sholat'      => $request->mtrbulanan_sholat,
                        'mtrbulanan_doa_harian'  => $request->mtrbulanan_doa_harian,
                        'mtrbulanan_surah_pendek'=> $request->mtrbulanan_surah_pendek,
                        'mtrbulanan_quran'       => $request->mtrbulanan_quran,
                        'nilai_solat'            => $request->nilai_solat,
                        'nilai_doa_harian'       => $request->nilai_doa_harian,
                        'nilai_surah_pendek'     => $request->nilai_surah_pendek,
                        'nilai_quran'            => $request->nilai_quran,
                     ]);

        return redirect('/bulanan')->with('success', 'Data Berhasil Diupdate');
    }

    public function destroy(Request $request,$id)
    {

  
        BulananModel::where('id', $id)->delete();
        return redirect('/bulanan')->with('success', 'Data Berhasil Dihapus');
    }



    public function tambah($id)
    {
        $login = Auth::user()->pengguna_nama;
        $data = array(
            'title'        => 'Catatan Bulanan',
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

                
             return view('admin.bulanan.mtrbulanan', $data);
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
            'title'        => 'Data Monitoring Bulanan',
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

            'data_all'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_guru.guru_username', @$login)
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
            'data_adm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
                              
            'data_wm'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                ->where('tbl_mtrbulanan.id', @$id)
                                ->get(),
            
        );

 
         return view('admin.bulanan.edit', $data);
    }

}
