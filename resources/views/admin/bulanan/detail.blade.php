@extends('layout.layout')
@section('content')

        <div class="content-body">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <div class="d-flex align-items-center">
                                <br>
                               
                               
                             </div>
                            </div>
                            <div class="card-body">    
                                <img src="{{asset('storage/images/logo.png')}}" width="100px" alt="">
                                <center>  <h3 class="card-title">LAPORAN MONITORING BULANAN</h3></center>       
                                <center>  <h5 class="card-title">Taman Pendidikan Quran (TPQ) Nurul Jadid</h5></center> 
                                <hr >                                     
                             
                                <?php if(Auth::user()->role == 'guru') {
                                    $data = $data_all;
                             }elseif(Auth::user()->role == 'walimurid'){
                                    $data = $data_wm;
                        }elseif(Auth::user()->role == 'admin'){
                                    $data = $data_adm;
                        } ?>

                                {{-- Laporan --}}
                                @foreach ($data as $d )
                               <center>
                                <table class="" width="80%" align="center" border="0">   
                                    
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{$d->kelas_nama}}</td>
                                        </tr>

                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{$d->santri_nama}}</td>
                                        </tr>

                                        <tr>
                                            <td>Nis</td>
                                            <td>:</td>
                                            <td>{{$d->santri_nis}}</td>
                                        </tr>

                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{$d->santri_jk}}</td>
                                        </tr>

                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{tgl_indo($d->mtrbulanan_tgl)}}</td>
                                        </tr>

                                        <tr>
                                            <td>Bulan</td>
                                            <td>:</td>
                                            <td>
                                                
                                                {{bulan(substr($d->mtrbulanan_tgl ,5,2))}} -
                                                {{bulan(substr($d->mtrbulanan_tgl ,0,4))}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><hr></td>
                                            <td><hr></td>
                                             <td><hr></td>
                                        </tr>


                                        <tr>
                                        
                                            <td>Pembelajaran Sholat</td>
                                            <td>:</td>
                                            <td>
                                            Nilai :{{$d->nilai_solat}} <br>
                                            List :{{$d->list_sholat}} <br>
                                            Ket :{{$d->mtrbulanan_sholat}}
                                         </td>
                                        </tr>
                                        <tr>
                                            <td>Hafalan Doa harian</td>
                                            <td>:</td>
                                       <td>    
                                         Nilai :{{$d->nilai_doa_harian}} <br>
                                        List :{{$d->list_doa_harian}} <br>
                                        Ket :{{$d->mtrbulanan_doa_harian}}</td>
                                        </tr>
                                        <tr>
                                            <td>Hafalan Surah Pendek</td>
                                            <td>:</td>
                                         <td>
                                            Nilai :{{$d->nilai_surah_pendek}} <br>
                                            List :{{$d->list_surah_pendek}} <br>
                                            Ket :{{$d->mtrbulanan_surah_pendek}}
                                         </td>
                                        </tr>
                                        <tr>
                                            <td>Membaca Iqra' / Al-Quran</td>
                                            <td>:</td>
                                      <td>
                                        Nilai :{{$d->nilai_quran}} <br>
                                        List :{{$d->list_quran}} <br>
                                        Ket :{{$d->mtrbulanan_quran}}
                                      </td>
                                        </tr>
                                            
                                
                               </table>
                                <br><br>
                               </center>
                               @endforeach
      
            
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
  
@endsection