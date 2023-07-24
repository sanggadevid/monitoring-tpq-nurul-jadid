@extends('layout.layout')
@section('content')
        <div class="content-body">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <div class="d-flex align-items-center">
                                 <h4 class="card-title"> Monitoring Semesteran</h4>
                              
                             </div>
                            </div>
                            <div class="card-body">    
                               
                                <div class="">
                              
                                  <form action="/smesteran/store/" method="GET" enctype="multipart/form-data" >
                                    @csrf
                                   
                                    <?php if(Auth::user()->role == 'guru' || Auth::user()->role == 'admin'  ) {
                                        $data = $data_santri;
                                            }elseif(Auth::user()->role == 'walimurid'){
                                        $data = $data_santri_id;
                                        } ?>
                                        <div class="form-group">
                                            <label>Nama Santri </label>
                                            <select  class="form-control" name="santri_id" required>
                                                <option value="" hidden>-- Silahkan Pilih--</option>
                                                @foreach ( $data  as $k)
                                                <option value="{{$k->id}}" >{{$k->santri_nis}} - {{$k->santri_nama}}</option >
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Tanggal </label>
                                                    <input type="Date" class="form-control" value="" name="tanggal" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Semester </label>
                                                    <select  class="form-control" name="semester" required>
                                                        <option value="" hidden>-- Silahkan Pilih --</option>
                                                        <option value="Ganjil" >Ganjil</option>
                                                        <option value="Genap" >Genap</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Tahun Ajaran </label>
                                                    <select  class="form-control" name="tahun_ajaran" required>
                                                        {{-- <option value="" hidden>-- Silahkan Pilih --</option> --}}
                                                        <?php 
                                                        $v = date('Y');
                                                        for ($i=2020; $i <= $v; $i++) { 
                                                          if ($i == $v) {?>
                                                            <option value="<?= $i ?>" selected="selected"><?= $i ?></option>
                                                           <?php }else{  ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                    <div class="">
                                      
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                    </form>
                              
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
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                   $no =1;
                                @endphp
                                @foreach ($data_santri as $row )
                                    
                          
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
                                           <a href="/bulanan/tambah/{{$row->id}}" class="btn btn-xs  btn-primary"><i class="fa fa-note"  style="padding-right:7px;"> Pilih</i></a>
                                           
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
                                                <th>Aksi</th>
                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                           $no =1;
                                        @endphp
                                        @foreach ($data_santri as $row )
                                            
                                  
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