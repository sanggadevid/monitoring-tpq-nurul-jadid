<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_pengguna')->insert([
            'pengguna_nama' => 'admin',
            'pengguna_email' =>'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        
    }
}
