<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemasok extends Model
{
    protected $table ="pemasoks";
    protected $fillable =['nama_pemasok','alamat','no_telepon'];

    protected $primarykey='id';

    public function barang_masuk(): HasMany
    {
        return $this->hasMany('App\barang_masuk');
    }
}
