@extends('layout.layout')
@section('content')
        <div class="content-body">
        
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
                                                <th>Guru</th>
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
                                                <td>{{$row->guru_nama}}</td>
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
            <!-- #/ container -->
        </div>

        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/santri/store" method="POST">
                    @csrf
                    <div class="modal-body">
                       
                        <div class="form-group">
                            <label>NIS </label>
                            <input type="text" class="form-control" name="santri_nis" reuired>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="santri_nama" reuired>
                        </div>
                        <div class="form-group">
                            <label>Kelas </label>
                            <select  class="form-control" name="kelas_id" reuired>
                                <option value="" hidden>-- Pilih Kelas --</option>
                                @foreach ( $data_kelas as $k)
                                <option value="{{$k->id}}" >{{$k->kelas_nama}}</option >
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gueu </label>
                            <select  class="form-control" name="guru_id" reuired>
                                <option value="" hidden>-- Pilih Guru --</option>
                                @foreach ( $data_guru as $k)
                                <option value="{{$k->id}}" >{{$k->guru_nama}}</option >
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="santri_jk" reuired>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option value="Laki-laki" >Laki-laki</option>
                                <option value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat lahir </label>
                            <input type="text" class="form-control" name="santri_tmp_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" name="santri_tgl_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" name="santri_alamat" reuired>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- edit --}}

        @foreach ($data_santri as $d )
        <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/santri/update/{{$d->id}}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>NIS </label>
                            <input type="text" class="form-control" value="{{$d->santri_nis}}" name="santri_nis" reuired>
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="{{$d->santri_nama}}" name="santri_nama" reuired>
                        </div>
                        <div class="form-group">
                            <label>Kelas </label>
                            <select  class="form-control" name="kelas_id" reuired>
                                <option value="{{$d->kelas_id}}" hidden>{{$d->kelas_nama}}</option>
                                @foreach ( $data_kelas as $k)
                                <option value="{{$k->id}}" >{{$k->kelas_nama}}</option >
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="santri_jk" reuired>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option <?php if($d['santri_jk']=='Laki-laki'){ echo "selected"; }?> value="Laki-laki" >Laki-laki</option>
                                <option <?php if($d['santri_jk']=='Perempuan' ){ echo "selected"; }?> value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat lahir </label>
                            <input type="text" class="form-control" value="{{$d->santri_tmp_lhr}}" name="santri_tmp_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" value="{{$d->santri_tgl_lhr}}" name="santri_tgl_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" value="{{$d->santri_alamat}}" name="santri_alamat" reuired>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- edit --}}

            {{-- hapus --}}

        @foreach ($data_santri as $h )
        <div class="modal fade" id="modalHapus{{$h->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/santri/destroy/{{$h->id}}" method="GET">
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