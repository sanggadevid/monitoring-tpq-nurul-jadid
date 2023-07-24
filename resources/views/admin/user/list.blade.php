@extends('layout.layout')
@section('content')
        <div class="content-body">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <div class="d-flex align-items-center">
                                 <h4 class="card-title">Data Admin</h4>
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
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                           $no =1;
                                        @endphp
                                        @foreach ($data_pengguna as $row )
                                            
                                  
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->pengguna_nama}}</td>
                                                <td>{{$row->pengguna_email}}</td>
                                                <td>xx</td>
                                                <td>{{$row->role}}</td>
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
                    <form action="/pengguna/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="pengguna_nama" reuired>
                        </div>
                          <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" name="pengguna_email" reuired>
                        </div>
                            <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control" name="password" reuired>
                        </div>
                            <div class="form-group">
                            <label>Level </label>
                            <select  class="form-control" name="role" reuired>
                             <option value="" hidden>-- Pilih Level --</option>
                             <option value="admin" >Admin</option>
                             <option value="guru" >Guru</option>
                             <option value="walimurid" >Wali Murid</option>
                               
                            </select>
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

        @foreach ($data_pengguna as $d )
        <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/pengguna/update/{{$d->id}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="{{$d->pengguna_nama}}" name="pengguna_nama" reuired>
                        </div>
                          <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" value="{{$d->pengguna_email}}" name="pengguna_email" reuired>
                        </div>
                            <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control" value="" name="password" reuired>
                        </div>
                            <div class="form-group">
                            <label>Level </label>
                            <select  class="form-control" name="role" reuired>
                             <option <?php if($d['role']=='admin'){ echo "selected"; }?> value="admin" >Admin</option>
                             <option <?php if($d['role']=='guru' ){ echo "selected"; }?> value="guru" >Guru</option>
                             <option <?php if($d['role']=='walimurid' ){ echo "selected"; }?> value="walimurid" >Wali Murid</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Kembali</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- edit --}}

            {{-- hapus --}}

        @foreach ($data_pengguna as $h )
        <div class="modal fade" id="modalHapus{{$h->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/pengguna/destroy/{{$h->id}}" method="GET">
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