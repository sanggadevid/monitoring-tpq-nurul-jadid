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
                                <center>  <h3 class="card-title">LAPORAN MONITORING HARIAN</h3></center>       
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
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{tgl_indo($d->catatan_tgl)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{$d->santri_jk}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Guru</td>
                                            <td>:</td>
                                            <td>{{$d->guru_nama}}</td>
                                        </tr>

                                        <tr>
                                            <td>Laporan Catatan Harian</td>
                                            <td>:</td>
                                            <td>{{$d->catatan_laporan}}</td>
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