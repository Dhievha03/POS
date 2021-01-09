<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'nama_distributor',
        'alamat',
        'no_telp'
    ];
}
