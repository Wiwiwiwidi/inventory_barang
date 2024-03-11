<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StokBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kategori_id');
            $table->bigInteger('rak_id');
            $table->bigInteger('gudang_id');
            $table->string('gambar',100);
            $table->string('nama_barang',150);
            $table->string('jumlah_barang',150);
            $table->string('harga_barang',150);
            $table->string('total',150);
            $table->date('tanggal');
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_barangs');
    }
}
