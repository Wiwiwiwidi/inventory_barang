<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok_barang extends Model
{
    protected $table="stok_barangs";
    protected $fillable=['kategori_id','rak_id','gudang_id','gambar','nama_barang','jumlah_barang','harga_barang','total','tanggal'];

    protected $primarykey='id';

    public function kategori()
    {
        return $this->belongsTo('App\kategori');
    }

    public function rak()
    {
        return $this->belongsTo('App\rak');
    }

    public function gudang()
    {
        return $this->belongsTo('App\gudang');
    }
    
    public function barang_masuk(): HasMany
    {
        return $this->hasMany('App\barang_masuk');
    }
    

    public function barang_keluar(): HasMany
    {
        return $this->hasMany('App\barang_keluar');
    }
}

