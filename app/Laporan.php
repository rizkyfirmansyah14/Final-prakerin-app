<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
    }

     public function user()
    {
        return $this->belongsTo('App\Siswa');
    }

    protected $table = "laporans";
 
    protected $fillable = ['nama','kelas','jurusan','file'];

}
