    @extends('layout.layout')
    @section('content')
            <div class="content-body">
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Monitoring Bulanan</h4>
                                    @if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
                                    <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah</button>
                                    @endif
                                </div>
                                </div>
                                <div class="card-body">                             
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Guru</th>
                                                    <th>Bulan</th>
                                                    <th>Pembelajaran Sholat</th>
                                                    <th>Hafalan Doa Harian</th>
                                                    <th>Hafalan Surah Pendek</th>
                                                    <th>Membaca Al-Quran</th>
                                                    @if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
                                                    <th>Aksi</th>
                                                    @endif
                                                    
                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $no =1;
                                            @endphp
                                            <?php if(Auth::user()->role == 'guru') {
                                                $data = $data_all;
                                         }elseif(Auth::user()->role == 'walimurid'){
                                                $data = $data_wm;
                                    }elseif(Auth::user()->role == 'admin'){
                                                $data = $data_adm;
                                    }  ?>

                                            @foreach ($data as $row )
                                                
                                    
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$row->santri_nis}}</td>
                                                    <td>{{$row->santri_nama}}</td>
                                                    <td>{{$row->kelas_nama}}</td>
                                                    <td>{{$row->guru_nama}}</td>
                                                    <td>{{$row->mtrbulanan_tgl}}</td>
                                                    <td>
                                                        Nilai :{{$row->nilai_solat}} <br>
                                                        List :{{$row->list_sholat}} <br>
                                                        Ket :{{$row->mtrbulanan_sholat}}
                                                    </td>
                                                    <td>
                                                        Nilai :{{$row->nilai_doa_harian}} <br>
                                                        List :{{$row->list_doa_harian}} <br>
                                                        Ket :{{$row->mtrbulanan_doa_harian}}
                                                    </td>
                                                    <td>
                                                        Nilai :{{$row->nilai_surah_pendek}} <br>
                                                        List :{{$row->list_surah_pendek}} <br>
                                                        Ket :{{$row->mtrbulanan_surah_pendek}}
                                                    </td>
                                                    <td>
                                                        Nilai :{{$row->nilai_quran}} <br>
                                                        List :{{$row->list_quran}} <br>
                                                        Ket :{{$row->mtrbulanan_quran}}
                                                    </td>
                                                
                                                    {{-- <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-xs  btn-primary"><i class="fa fa-edit"  style="padding-right:7px;"> Edit</i></a> --}}
                                                    @if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
                                                    <td>
                                                    <a  href="#modalHapus{{$row->id}}" data-toggle="modal"  class="btn btn-xs  btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                                    <a  href="/bulanan/detail/{{$row->id}}"  class="btn btn-xs  btn-primary"><i class="fa fa-list"> Detail</i></a>
                                                    <a  href="/bulanan/edit/{{$row->id}}"  class="btn btn-xs  btn-success"><i class="fa fa-list"> Edit</i></a>  
                                                </td>
                                                    @endif
                                                    @if(Auth::user()->role == 'walimurid')
                                                    <td>
                                                    
                                                    <a  href="/bulanan/detail/{{$row->id}}"  class="btn btn-xs  btn-primary"><i class="fa fa-list"> Detail</i></a>
                                                </td>
                                                    @endif

                                                
                                                
                                                
                                                </tr>
                                                    @endforeach
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #/ container -->
            </div>
        
            {{-- Santri --}}
            <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pilih Data Santri</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="card-body">                             
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Pilih</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            
                
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $no =1;
                                    @endphp
                        <?php if(Auth::user()->role == 'guru' || Auth::user()->role == 'walimurid') {
                                    $data = $data_santri;
                                }elseif(Auth::user()->role == 'admin'){
                                   $data = $data_santri_adm;
                                    }
                                    ?>
                                  
                                @foreach ($data as $row )
                                        
                            
                                        <tr>
                                            {{-- <td>{{$no++}}</td> --}}
                                            <td>
                                            <a href="/bulanan/tambah/{{$row->id}}" class="btn btn-xs  btn-primary"><i class="fa fa-note"  style="padding-right:7px;"> Pilih</i></a>
                                            
                                            </td>
                                            <td>{{$row->santri_nis}}</td>
                                            <td>{{$row->santri_nama}}</td>
                                            <td>{{$row->kelas_nama}}</td>
                                            <td>{{$row->santri_jk}}</td>
                                            <td>{{$row->santri_tmp_lhr}}</td>
                                            <td>{{$row->santri_tgl_lhr}}</td>
                                            <td>{{$row->santri_alamat}}</td>
                                        
                                        
                                        </tr>
                                            @endforeach
                                    </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            {{-- edit --}}

            @foreach ($data_all as $d )
            <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Santri</h4>
                                    <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i>
                                    Tambah</button>
                                </div>
                                </div>
                                <div class="card-body">                             
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                            $no =1;
                                            @endphp
                                            <?php if(Auth::user()->role == 'guru') {
                                                $data = $data_santri;
                                            }elseif(Auth::user()->role == 'admin'){
                                               $data = $data_santri_adm;
                                                }
                                                
                                                dd($data)?>
                                            @foreach ($data as $row )
                                                
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$row->santri_nis}}</td>
                                                    <td>{{$row->santri_nama}}</td>
                                                    <td>{{$row->kelas_nama}}</td>
                                                    <td>{{$row->santri_jk}}</td>
                                                    <td>{{$row->santri_tmp_lhr}}</td>
                                                    <td>{{$row->santri_tgl_lhr}}</td>
                                                    <td>{{$row->santri_alamat}}</td>
                                                
                                                    <td>
                                                    <a href="#modalEdit{{$row->id}}" data-toggle="modal" class="btn btn-xs  btn-primary"><i class="fa fa-edit"  style="padding-right:7px;"> Edit</i></a>
                                                    <a  href="#modalHapus{{$row->id}}" data-toggle="modal"  class="btn btn-xs  btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                                                    </td>
                                                </tr>
                                                    @endforeach
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
        {{-- edit --}}

                {{-- hapus --}}

            @foreach ($data_all as $h )
            <div class="modal fade" id="modalHapus{{$h->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <form action="/bulanan/destroy/{{$h->id}}" method="GET">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                            <h5>Apakah Anda ingin Menghapus Data Ini?</h5>
                            </div>
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Kembali</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- hapus --}}

    @endsection