<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SantriModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_santri';
    protected $fillable = [
        'kelas_id',
        'guru_id',
        'santri_nis',
        'santri_nama',
        'santri_jk',
        'santri_tmp_lhr',
        'santri_tgl_lhr',
        'santri_alamat',

    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
