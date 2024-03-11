<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    protected $table ="raks";
    protected $fillable =['nama_rak'];

    protected $primarykey='id';

    public function stok_barang(): HasMany
    {
        return $this->hasMany('App\stok_barang');
    }
}
