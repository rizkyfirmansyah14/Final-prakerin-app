<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Jurusan extends Model
{
    public function Laporan()
    {
        return $this->belongsTo('App\Laporan');
    }
}
