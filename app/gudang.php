<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    protected $table ="gudangs";
    protected $fillable =['nama_gudang','lokasi'];

    protected $primarykey='id';

    public function stok_barang(): HasMany
    {
        return $this->hasMany('App\stok_barang');
    }
}
