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
                                <center>  <h3 class="card-title">LAPORAN MONITORING SEMESTERAN</h3></center>       
                                <center>  <h5 class="card-title">Taman Pendidikan Quran (TPQ) Nurul Jadid</h5></center> 
                                <hr >                                     
                             

                                {{-- Laporan --}}
                                @foreach ($data_santri as $d )
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
                                            <td>Semester</td>
                                            <td>:</td>
                                            <td>{{$semester}}</td>
                                        </tr>
                                            
                                
                               </table>
                                <br><br>
                               </center>
                               @endforeach
                              <center> <h5>Grafik perkembangan siswa  Semester {{$semester}} pada Tanggal {{tgl_indo($tanggal)}}</h5></center>
                          
    <style>
        .box1 h3{
                writing-mode: vertical-lr;
                display: inline;
                background-color: #ffffff;
                color: #000;
                padding: 15px;
                margin-left: 0;
                margin-top: 150px;
                word-spacing: 2px;
                letter-spacing: 1.2px;
                transform: rotate(180deg);
                border-radius: 25px;
            }
    </style>
                            {{-- Grafik --}}
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="box1">
                                        <h3>( Skor/Nilai )</h3>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                
                                    {!! $monitorChart2->container() !!}
                                    
                                <center><h3>( Bulan )</h3></center>
                                </div>

                            </div>
                            {{-- Grafik --}}
            
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
  
        <script src="{{ $monitorChart2->cdn() }}"></script>

        {{ $monitorChart2->script() }}
@endsection