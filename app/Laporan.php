<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function User()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }

    public function jurusan()
    {
        return $this->hasMany('App\Jurusan', 'id', 'jurusan_id');
    }
}
