<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarianModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_mtrharian';
    protected $fillable = [
        'santri_id',
        'kelas_id',
        'guru_id',
        'catatan_hari',
        'catatan_laporan',
        'catatan_tgl',

    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
