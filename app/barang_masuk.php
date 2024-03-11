<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    protected $table="barang_masuks";
    protected $fillable=['stok_barang_id','pemasok_id','jumlah_masuk','harga','total','tgl_masuk'];

    protected $primarykey='id';

    public function stok_barang()
    {
        return $this->belongsTo('App\stok_barang')->withDefault();
    }
    
    public function pemasok()
    {
        return $this->belongsTo('App\pemasok');
    }
    
}


