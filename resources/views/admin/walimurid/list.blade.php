@extends('layout.layout')
@section('content')
        <div class="content-body">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <div class="d-flex align-items-center">
                                 <h4 class="card-title">Data Wali Murid</h4>
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
                                                <th>Nama</th>
                                                <th>Nama Anak</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Nohp</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                           $no =1;
                                        @endphp
                                        @foreach ($data_walimurid as $row )
                                            
                                  
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->walimurid_nama}}</td>
                                                <td>{{$row->santri_nama}}</td>
                                                <td>{{$row->walimurid_jk}}</td>
                                                <td>{{$row->walimurid_tmp_lhr}}</td>
                                                <td>{{$row->walimurid_tgl_lhr}}</td>
                                                <td>{{$row->walimurid_tlp}}</td>
                                                <td>{{$row->walimurid_email}}</td>
                                                <td>{{$row->walimurid_alamat}}</td>

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
                    <form action="/walimurid/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="walimurid_nama" reuired>
                        </div>
                        <div class="form-group">
                            <label>Nama Anak </label>
                            <select  class="form-control" name="santri_id" reuired>
                                <option value="" hidden>-- Silahkan Pilih--</option>
                                @foreach ( $data_santri as $k)
                                <option value="{{$k->id}}" >{{$k->santri_nama}}</option >
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="walimurid_jk" reuired>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option value="Laki-laki" >Laki-laki</option>
                                <option value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tempat lahir </label>
                            <input type="text" class="form-control" name="walimurid_tmp_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" name="walimurid_tgl_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" name="walimurid_alamat" reuired>
                        </div>
                       
                        <div class="form-group">
                            <label>Nohp </label>
                            <input type="text" class="form-control" name="walimurid_tlp" reuired>
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" name="walimurid_email" reuired>
                        </div>
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" class="form-control" name="username" reuired>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control" name="password" reuired>
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

        @foreach ($data_walimurid as $d )
        <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/walimurid/update/{{$d->id}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="{{$d->walimurid_nama}}" name="walimurid_nama" reuired>
                        </div>
            
                        <div class="form-group">
                            <label>Nama Anak </label>
                            <select  class="form-control" name="santri_id" reuired>
                                <option value="{{$d->santri_id}}" hidden>{{$d->santri_nama}}</option>
                                @foreach ( $data_santri as $k)
                                <option value="{{$k->id}}" >{{$k->santri_nama}}</option >
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="walimurid_jk" reuired>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option <?php if($d['walimurid_jk']=='Laki-laki'){ echo "selected"; }?> value="Laki-laki" >Laki-laki</option>
                                <option <?php if($d['walimurid_jk']=='Perempuan' ){ echo "selected"; }?> value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                     
                        <div class="form-group">
                            <label>Tempat lahir </label>
                            <input type="text" class="form-control" value="{{$d->walimurid_tmp_lhr}}" name="walimurid_tmp_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" value="{{$d->walimurid_tgl_lhr}}" name="walimurid_tgl_lhr" reuired>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" value="{{$d->walimurid_alamat}}" name="walimurid_alamat" reuired>
                        </div>
                       
                        <div class="form-group">
                            <label>Nohp </label>
                            <input type="text" class="form-control" value="{{$d->walimurid_tlp}}" name="walimurid_tlp" reuired>
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" value="{{$d->walimurid_email}}" name="walimurid_email" reuired>
                        </div>
                      
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" class="form-control" value="{{$d->username}}" name="username" reuired>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control"  name="password" reuired>
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

        @foreach ($data_walimurid as $h )
        <div class="modal fade" id="modalHapus{{$h->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/walimurid/destroy/{{$h->id}}" method="GET">
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