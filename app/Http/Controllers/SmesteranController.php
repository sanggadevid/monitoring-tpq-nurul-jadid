<?php

namespace App\Http\Controllers;

use App\Charts\MonitorChart;
use App\Charts\MonitorChart2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\SantriModel;
use App\Models\BulananModel;
use Illuminate\Support\Facades\Auth;

class SmesteranController extends Controller
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

 
        $data = array(
            'title'        => 'Data Monitoring Semesteran',
            'data_guru'    => GuruModel::all(),
        
            'data_kelas'   => KelasModel::all(),
          
            'data_santri'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                            ->select('tbl_santri.*', 'tbl_kelas.kelas_nama')
                                            ->get(),
                                                
            'data_santri_id'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                            ->select('tbl_santri.*', 'tbl_kelas.kelas_nama')
                                            ->join('tbl_walimurid', 'tbl_walimurid.santri_id', '=', 'tbl_santri.id')  
                                            ->where('tbl_walimurid.santri_id', @$d->santri_id)
                                            ->get(),

            'data_all'     => DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->get(),
            
        );

 
         return view('admin.smesteran.list', $data);
    }


    public function store(Request $request, MonitorChart $monitorChart, MonitorChart2 $monitorChart2)
    {
        $semester =  $request->semester;
        $tahun_ajaran =  $request->tahun_ajaran;
        if($semester=='Ganjil'){
            $santri_id=  $request->santri_id;
            $tanggal=  $request->tanggal;
    
            $data = array(
                'title'        =>'Data Monitoring Semesteran',
                'monitorChart' => $monitorChart->build($santri_id, $tahun_ajaran),
                'data_guru'    => GuruModel::all(),
            
                'data_kelas'   => KelasModel::all(),
                'data_santri'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama')
                                                ->where('tbl_santri.id', $santri_id)
                                                ->get(),
    
                'data_all'     => DB::table('tbl_mtrbulanan')
                                    ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                    ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                    ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                    ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                    ->get(),
                'semester'      => $semester,
                'tanggal'      => $tanggal,
    
                
            );
    
     
             return view('admin.smesteran.semesterganjil', $data);
        }else{
            $santri_id=  $request->santri_id;
            $tanggal=  $request->tanggal;
    
            $data = array(
                'title'        =>'Data Monitoring Semesteran',
                'monitorChart2' => $monitorChart2->build($santri_id,$tahun_ajaran),
         
                'data_guru'    => GuruModel::all(),
            
                'data_kelas'   => KelasModel::all(),
                'data_santri'  => SantriModel::join('tbl_kelas','tbl_kelas.id','=','tbl_santri.kelas_id')
                                                ->select('tbl_santri.*', 'tbl_kelas.kelas_nama')
                                                ->where('tbl_santri.id', $santri_id)
                                                ->get(),
    
                'data_all'     => DB::table('tbl_mtrbulanan')
                                    ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                    ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                    ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                    ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                    ->get(),
                'semester'      => $semester,
                'tanggal'      => $tanggal,
    
                
            );
    
     
             return view('admin.smesteran.semestergenap', $data);
        }
   
        
    }

    public function update(Request $request, $id)
    {
        BulananModel::where('id', $id)
                     ->where('id', $id)
                     ->update([
                        'kelas_id'           => $request->kelas_id,
                        'santri_nis'         => $request->santri_nis,
                        'santri_nama'        => $request->santri_nama,
                        'santri_jk'          => $request->santri_jk,
                        'santri_tmp_lhr'     => $request->santri_tmp_lhr,
                        'santri_tgl_lhr'     => $request->santri_tgl_lhr,
                        'santri_alamat'      => $request->santri_alamat,
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
        $data = array(
            'title'        => 'Catatan Bulanan',
            'data_guru'    => GuruModel::all(),
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
}
