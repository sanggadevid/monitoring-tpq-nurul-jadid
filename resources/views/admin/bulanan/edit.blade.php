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
                                <center>  <h4 class="card-title">Input Data Catatan Bulanan</h4></center>                         
                                <div class="table-responsive">
                                  {{-- Awal --}}
                                  @foreach ($data_adm as $d )
                                  <form action="/bulanan/update/{{$d->id}}" method="POST" enctype="multipart/form-data" >
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
                                   <input type="hidden" class="form-control" value="{{$d->santri_id}}" readonly name="santri_id" required>
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
                                            <label>Tanggal / Bulan </label>
                                            <input type="Date" class="form-control" value="{{$d->mtrbulanan_tgl}}" name="mtrbulanan_tgl" required>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>Semester </label>
                                            <select  class="form-control" name="list_sholat" reuired>
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                <option value="Ganjil" >Ganjil</option>
                                                <option value="Genap" >Genap</option>
                                            </select>
                                        </div> --}}
                                        {{-- Temp Awal --}}
                                  
                                        <div class="form-group">
                                            <label>List Sholat </label>
                                            <select  class="form-control" name="list_sholat" reuired>
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                <option value="Gerakan sholat" >Gerakan sholat</option>
                                                <option value="Bacaan sholat" >Bacaan sholat</option>
                                                <option value="Doa sesudah sholat" >Doa sesudah sholat</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai </label>
                                            <input type="number" class="form-control" value="{{$d->nilai_solat}}" name="nilai_solat" required>
                                        </div>     
                                        <div class="form-group">
                                            <label>Pembelajaran Sholat (Keterangan/Catatan)</label>
                                            <textarea name="mtrbulanan_sholat"  class="form-control">{{$d->mtrbulanan_sholat}}</textarea>
                                        </div>
                                         {{-- Temp End --}}
                                          {{-- Temp Awal --}}
                                  
                                        <div class="form-group">
                                            <label>List Doa Harian </label>
                                            <select  class="form-control" name="list_doa_harian" reuired>
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                <option value="Doa masuk/keluar masjid" >Doa masuk/keluar masjid</option>
                                                <option value="Doa keluar rumah" >Doa keluar rumah</option>
                                                <option value="Doa turun hujan" >Doa turun hujan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai </label>
                                            <input type="number" class="form-control" value="{{$d->nilai_doa_harian}}" name="nilai_doa_harian" required>
                                        </div>     
                                        <div class="form-group">
                                            <label>Doa Harian (Keterangan/Catatan)</label>
                                            <textarea name="mtrbulanan_doa_harian"  class="form-control">{{$d->mtrbulanan_doa_harian}}</textarea>
                                        </div>
                                         {{-- Temp End --}}
                                              {{-- Temp Awal --}}
                                      
                                        <div class="form-group">
                                            <label>List Surat pendek  </label>
                                            <select  class="form-control" name="list_surah_pendek" reuired>
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                <option value="Ad-duha" >Ad-duha</option>
                                                <option value="At-tin" >At-tin</option>
                                                <option value="Al-fill" >Al-fill</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai </label>
                                            <input type="number" class="form-control" value="{{$d->nilai_surah_pendek}}" name="nilai_surah_pendek" required>
                                        </div>     
                                        <div class="form-group">
                                            <label>Hafalan Surah Pendek (Keterangan/Catatan)</label>
                                            <textarea name="mtrbulanan_surah_pendek"  class="form-control">{{$d->mtrbulanan_surah_pendek}}</textarea>
                                        </div>
                                         {{-- Temp End --}}
                                                 {{-- Temp Awal --}}
                                   
                                        <div class="form-group">
                                            <label>List Membaca Al-Quran </label>
                                            <select  class="form-control" name="list_quran" reuired>
                                                <option value="" hidden>-- Silahkan Pilih --</option>
                                                <option value="Tajwid" >Tajwid</option>
                                                <option value="Seni baca quran" >Seni baca quran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai </label>
                                            <input type="number" class="form-control" value="{{$d->nilai_quran}}" name="nilai_quran" required>
                                        </div>     
                                        <div class="form-group">
                                            <label>Membaca Al-Quran (Keterangan/Catatan)</label>
                                            <textarea name="mtrbulanan_quran"  class="form-control">{{$d->mtrbulanan_quran}}</textarea>
                                        </div>
                                         {{-- Temp End --}}
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
                                                <option value="{{$d->guru_id}}" >{{$d->guru_nama}}</option >
                                                @endforeach
                                            </select> --}}
                                        </div>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/bulanan" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Kembali</a>
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