<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalimuridModel extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'tbl_walimurid';
    protected $fillable = [
        'santri_id',
        'username',
        'password',
        'walimurid_nama',
        'walimurid_jk',
        'walimurid_tmp_lhr',
        'walimurid_tgl_lhr',
        'walimurid_email',
        'walimurid_tlp',
        'walimurid_alamat',


    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
