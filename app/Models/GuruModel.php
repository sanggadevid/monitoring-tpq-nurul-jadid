<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_guru';
    protected $fillable = [
        'kelas_id',
        'guru_username',
        'guru_password',
        'guru_nama',
        'guru_foto',
        'guru_jk',
        'guru_ttl',
        'guru_alamat',
        'guru_jabatan',
        'guru_nohp',
        'guru_email',

    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
