<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table ="kategoris";
    protected $fillable =['nama_kategori'];

    protected $primarykey='id';

    public function stok_barang()
    {
        return $this->hasOne('App\stok_barang');
    }
}
