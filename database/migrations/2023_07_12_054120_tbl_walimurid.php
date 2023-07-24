<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_walimurid', function (Blueprint $table) {
            $table->id();   
            $table->integer('santri_id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('walimurid_nama')->nullable();
            $table->string('walimurid_jk')->nullable();
            $table->string('walimurid_tmp_lhr')->nullable();
            $table->string('walimurid_tgl_lhr')->nullable();
            $table->string('walimurid_email')->nullable();
            $table->string('walimurid_tlp')->nullable();
            $table->text('walimurid_alamat')->nullable();
 
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
    {
        Schema::dropIfExists('tbl_walimurid');
    }
};
