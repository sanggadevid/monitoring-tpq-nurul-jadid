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
                                <center>  <h4 class="card-title">Edit Data Catatan Harian</h4></center>                         
                                <div class="table-responsive">
                                  {{-- Awal --}}
                                  {{-- <?php dd($data_adm) ?> --}}
                                  @foreach ($data_adm as $d )
                                  <form action="/harian/update/{{$d->id}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-body">
                    
                                        <div class="form-group">
                                            <label>NIS </label>
                                            <input type="text" class="form-control" value="{{$d->santri_nis}}" readonly name="santri_nis" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas </label>
                                            <input type="hidden" class="form-control" value="{{$d->kelas_id}}" readonly name="kelas_id" required>
                                            <input type="hidden" class="form-control" value="{{$d->santri_id}}" readonly name="santri_id" required>
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
                                                <option <?php if($d->catatan_hari=='Senin'){ echo "selected"; }?> value="Senin" >Senin</option>
                                                <option <?php if($d->catatan_hari=='Selasa' ){ echo "selected"; }?> value="Selasa" >Selasa</option>
                                                <option <?php if($d->catatan_hari=='Rabu'){ echo "selected"; }?> value="Rabu" >Rabu</option>
                                                <option <?php if($d->catatan_hari=='Kamis' ){ echo "selected"; }?> value="Kamis" >Kamis</option>
                                                <option <?php if($d->catatan_hari=='Jumat'){ echo "selected"; }?> value="Jumat" >Jumat</option>
                                                <option <?php if($d->catatan_hari=='Sabtu' ){ echo "selected"; }?> value="Sabtu" >Sabtu</option>
                                                <option <?php if($d->catatan_hari=='Minggu' ){ echo "selected"; }?> value="Minggu" >Minggu</option>                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal </label>
                                            <input type="date" class="form-control" value="{{$d->catatan_tgl}}" name="catatan_tanggal" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Catatan Harian </label>
                                    
                                            <textarea name="catatan_laporan"  class="form-control">{{$d->catatan_laporan}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Guru Pengajar </label>
                                            
                                            <input type="hidden" name="guru_id" value="{{$d->guru_id}}">
                                            <input type="text" class="form-control" readonly name="guru_nama" value="{{$d->guru_nama}}">
                                            {{-- <select  class="form-control" name="guru_id" required>
                                               
                                                <?php if(Auth::user()->role == 'guru') {
                                                    $data = $data_guru;
                                           }elseif(Auth::user()->role == 'admin'){
                                                   $data = $data_guru_adm;
                                          }  ?>
                                      
                                                @foreach ( $data as $k)
                                                <option value="{{$k->id}}" >{{$k->guru_nama}}</option >
                                                @endforeach
                                            </select> --}}
                                        </div>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/harian" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Kembali</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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