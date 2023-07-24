<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulananModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mtrbulanan';
    protected $fillable = [
        'santri_id',
        'kelas_id',
        'guru_id',
        'mtrbulanan_tgl',
        'mtrbulanan_sholat',
        'mtrbulanan_doa_harian',
        'mtrbulanan_surah_pendek',
        'mtrbulanan_quran',
        'list_sholat',
        'list_doa_harian',
        'list_surah_pendek',
        'list_quran', 
        'nilai_solat',
        'nilai_doa_harian',
        'nilai_surah_pendek',
        'nilai_quran',
        
    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
