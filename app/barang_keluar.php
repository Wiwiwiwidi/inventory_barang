<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    protected $table="barang_keluars";
    protected $fillable=['stok_barang_id','jumlah_keluar','tgl_keluar','keterangan'];

    protected $primarykey='id';
    
    public function stok_barang()
    {
        return $this->belongsTo('App\stok_barang')->withDefault();
    }
    
}
