<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'id_user',
        'jumlah_beli',
        'total_harga',
        'tanggal_beli'
    ];

    public function barang(){
    	return $this->hasMany('App\Barang');
    }
}
