<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\BulananModel;
use Illuminate\Support\Facades\DB;
class MonitorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($santri_id, $tahun_ajaran): \ArielMejiaDev\LarapexCharts\BarChart
    {

          //  Batas 7
            $bulan7   = DB::table('tbl_mtrbulanan')
                                ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
                                ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
                                ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
                                ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
                                ->where('tbl_santri.id', $santri_id)
                                ->whereMonth('mtrbulanan_tgl', '7')
                                ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
                                ->get();
                                
                                
            foreach ($bulan7 as $d) {
                    $nilai7 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
                
                }

        //  Batas 8
            $bulan8   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '8')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan8 as $d) {
            $nilai8 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 9
            $bulan9   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '9')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan9 as $d) {
            $nilai9 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 10
            $bulan10   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '10')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
           
            
            foreach ($bulan10 as $d) {
            $nilai10 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }

            //  Batas 11
            $bulan11   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '11')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
            
            
            foreach ($bulan11 as $d) {
            $nilai11 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }  
            
            //  Batas 12
            $bulan12   = DB::table('tbl_mtrbulanan')
            ->join('tbl_santri', 'tbl_santri.id', '=', 'tbl_mtrbulanan.santri_id')
            ->join('tbl_guru', 'tbl_guru.id', '=', 'tbl_mtrbulanan.guru_id')
            ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_mtrbulanan.kelas_id')
            ->select('tbl_mtrbulanan.*', 'tbl_santri.santri_nama','tbl_santri.santri_nis','tbl_santri.santri_jk',  'tbl_kelas.kelas_nama', 'tbl_guru.guru_nama')
            ->where('tbl_santri.id', $santri_id)
            ->whereMonth('mtrbulanan_tgl', '12')
            ->whereYear('mtrbulanan_tgl', $tahun_ajaran)
            ->get();
            
            
            foreach ($bulan12 as $d) {
            $nilai12 =  ($d->nilai_solat+$d->nilai_doa_harian+$d->nilai_surah_pendek+$d->nilai_quran)/4;
            }


        $data = [
        
            @$nilai7,
            @$nilai8,
            @$nilai9,
            @$nilai10,
            @$nilai11,
            @$nilai12,

        ];


        return $this->chart->barChart()
            ->setTitle('Grafik Monitoring Smesteran')
            ->setSubtitle($tahun_ajaran)
            // ->addData('Apex',$data)
            ->addData('Nilai',$data)
            ->setXAxis(['Juli', 'Agustus', 'September', 'Oktober', 'November','Desember',]);
    }
}
