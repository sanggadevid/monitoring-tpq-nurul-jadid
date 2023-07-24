<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_kelas';
    protected $fillable = [
        'kelas_nama',


    ];

  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}

