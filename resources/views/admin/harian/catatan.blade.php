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
                                <center>  <h4 class="card-title">Input Data Catatan Harian</h4></center>                         
                                <div class="table-responsive">
                                  {{-- Awal --}}
                                  @foreach ($data_santri as $d )
                                  <form action="/harian/store/{{$d->id}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-body">
                    
                                        <div class="form-group">
                                            <label>NIS </label>
                                            <input type="text" class="form-control" value="{{$d->santri_nis}}" readonly name="santri_nis" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas </label>
                                            <input type="hidden" class="form-control" value="{{$d->kelas_id}}" readonly name="kelas_id" required>
                                            <input type="text" class="form-control" value="{{$d->kelas_nama}}" readonly name="kelas_nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama </label>
                                            <input type="text" class="form-control" value="{{$d->santri_nama}}" readonly name="santri_nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin </label>
                                            <input type="text" class="form-control" value="{{$d->santri_jk}}" readonly name="santri_jk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Hari </label>
                                         
                                              <select  class="form-control" name="catatan_hari" id="">
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                 <option value="Senin">Senin</option>
                                                 <option value="Selasa">Selasa</option>
                                                 <option value="Rabu">Rabu</option>
                                                 <option value="Kamis">Kamis</option>
                                                 <option value="Jum'at">Jum'at</option>
                                                 <option value="Sabtu">Sabtu</option>
                                                 <option value="Minggu">Minggu</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal </label>
                                            <input type="date" class="form-control" value="" name="catatan_tanggal" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Catatan Harian </label>
                                    
                                            <textarea name="catatan_laporan"  class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Guru Pengajar </label>
                                            <select  class="form-control" name="guru_id" required>
                                                {{-- <option value="" hidden>-- Silahkan Pilih -- </option> --}}
                                            
                                                <?php if(Auth::user()->role == 'guru') {
                                                    $data = $data_guru;
                                           }elseif(Auth::user()->role == 'admin'){
                                                   $data = $data_guru_adm;
                                          }  ?>
                                      
                                                @foreach ( $data as $k)
                                                <option value="{{$k->id}}" >{{$k->guru_nama}}</option >
                                                @endforeach
                                            </select>
                                        </div>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/harian" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Kembali</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                    </form>
                                    @endforeach
                                  {{-- Akhir --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
  

@endsection