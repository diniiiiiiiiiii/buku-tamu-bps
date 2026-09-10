<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'instansi',
        'tujuan_kunjungan',
        'tanggal_kunjungan',
        'source',
    ];
}
