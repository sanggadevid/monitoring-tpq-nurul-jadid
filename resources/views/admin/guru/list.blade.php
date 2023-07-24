@extends('layout.layout')
@section('content')
        <div class="content-body">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                             <div class="d-flex align-items-center">
                                 <h4 class="card-title">Data Guru</h4>
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
                                                <th>Foto</th>
                                                <th>Kelas</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Jabatan</th>
                                                <th>Nohp</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                           $no =1;
                                        @endphp
                                        @foreach ($data_guru as $row )
                                            
                                  
                                            <tr>
                                                <td>{{$no++}}</td>
                                            
                                                <td>{{$row->guru_nama}}</td>
                                                <td><img src="{{asset('storage/images/'.$row->guru_foto)}}" width="100px" alt=""></td>
                                                <td>{{$row->kelas_nama}}</td>
                                                <td>{{$row->guru_jk}}</td>
                                                <td>{{$row->guru_ttl}}</td>
                                                <td>{{$row->guru_alamat}}</td>
                                                <td>{{$row->guru_jabatan}}</td>
                                                <td>{{$row->guru_nohp}}</td>
                                                <td>{{$row->guru_email}}</td>
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
                    <form action="/guru/store" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" name="guru_nama" required>
                        </div>
                        <div class="form-group">
                            <label>Foto </label>
                            <input type="file" class="form-control" name="poto" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas </label>
                            <select  class="form-control" name="kelas_id" required>
                                <option value="" hidden>-- Pilih Kelas --</option>
                                @foreach ( $data_kelas as $k)
                                <option value="{{$k->id}}" >{{$k->kelas_nama}}</option >
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="guru_jk" required>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option value="Laki-laki" >Laki-laki</option>
                                <option value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" name="guru_ttl" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" name="guru_alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan </label>
                            <input type="text" class="form-control" name="guru_jabatan" required>
                        </div>
                        <div class="form-group">
                            <label>Nohp </label>
                            <input type="text" class="form-control" name="guru_nohp" required>
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" name="guru_email" required>
                        </div>
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" class="form-control" name="guru_username" required>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control" name="guru_password" required>
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

        @foreach ($data_guru as $d )
        <div class="modal fade" id="modalEdit{{$d->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/guru/update/{{$d->id}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" class="form-control" value="{{$d->guru_nama}}" name="guru_nama" required>
                        </div>
                        <div class="form-group">
                            <label>Foto </label>
                            <input type="hidden" class="form-control" value="{{$d->guru_foto}}" name="guru_foto" >
                            <input type="file" class="form-control" name="poto" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas </label>
                            <select  class="form-control" name="kelas_id" required>
                                <option value="{{$d->kelas_id}}" hidden>{{$d->kelas_nama}}</option>
                                @foreach ( $data_kelas as $k)
                                <option value="{{$k->id}}" >{{$k->kelas_nama}}</option >
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin </label>
                            <select  class="form-control" name="guru_jk" required>
                                <option value="" hidden>-- Silahkan Pilih --</option>
                                <option <?php if($d['guru_jk']=='Laki-laki'){ echo "selected"; }?> value="Laki-laki" >Laki-laki</option>
                                <option <?php if($d['guru_jk']=='Perempuan' ){ echo "selected"; }?> value="Perempuan" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal lahir </label>
                            <input type="date" class="form-control" value="{{$d->guru_ttl}}" name="guru_ttl" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <input type="text" class="form-control" value="{{$d->guru_alamat}}" name="guru_alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan </label>
                            <input type="text" class="form-control" value="{{$d->guru_jabatan}}" name="guru_jabatan" required>
                        </div>
                        <div class="form-group">
                            <label>Nohp </label>
                            <input type="text" class="form-control" value="{{$d->guru_nohp}}" name="guru_nohp" required>
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input type="text" class="form-control" value="{{$d->guru_email}}" name="guru_email" required>
                        </div>
                        <div class="form-group">
                            <label>Username </label>
                            <input type="text" class="form-control" value="{{$d->guru_username}}" name="guru_username" required>
                        </div>
                        <div class="form-group">
                            <label>Password </label>
                            <input type="text" class="form-control"  name="guru_password" required>
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

        @foreach ($data_guru as $h )
        <div class="modal fade" id="modalHapus{{$h->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form action="/guru/destroy/{{$h->id}}" method="GET">
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