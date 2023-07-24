<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\BulananModel;
use Illuminate\Support\Facades\DB;
class MonitorChart2
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($santri_id, $tahun_ajaran): \ArielMejiaDev\LarapexCharts\BarChart
    {

          //  Batas 1
            $bulan1   = DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_santri.id', $santri_id)
                                ->whereMonth('mtrbulanan_tgl', '1')
                                ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
                                ->get();
                                
                                
            foreach ($bulan1 as $d) {
                    $nilai1 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
                
                }

        //  Batas 2
            $bulan2   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '2')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan2 as $d) {
            $nilai2 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 3
            $bulan3   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '3')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan3 as $d) {
            $nilai3 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 4
            $bulan4   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '4')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan4 as $d) {
            $nilai4 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 5
            $bulan5   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '5')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
            
            
            foreach ($bulan5 as $d) {
            $nilai5 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }  
            
            //  Batas 6
            $bulan6   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '6')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
            
            
            foreach ($bulan6 as $d) {
            $nilai6 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }


        $data = [
        
            @$nilai1,
            @$nilai2,
            @$nilai3,
            @$nilai4,
            @$nilai5,
            @$nilai6,

        ];


        return $this->chart->barChart()
            ->setTitle('Grafik Monitoring Smesteran')
            ->setSubtitle($tahun_ajaran)
            // ->addData('Apex',$data)
            ->addData('Nilai',$data)
            ->setXAxis(['Januari', 'Februari', 'Maret', 'April', 'Mei','Juni',]);
    }
}
