<?php

namespace App\Http\Controllers;
use App\kategori;
use App\pemasok;
use App\stok_barang;
use App\barang_masuk;
use App\barang_keluar;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_kategori = kategori::all()->count();
        $jumlah_pemasok = pemasok::all()->count();
        $jumlah_stok_barang = stok_barang::all()->count();
        $jumlah_barang_masuk = barang_masuk::all()->count();
        $jumlah_barang_keluar = barang_keluar::all()->count();

        return view('halamanberanda.beranda')
        ->with('jumlah_kategori',$jumlah_kategori)
        ->with('jumlah_pemasok',$jumlah_pemasok)
        ->with('jumlah_stok_barang',$jumlah_stok_barang)
        ->with('jumlah_barang_masuk',$jumlah_barang_masuk)
        ->with('jumlah_barang_keluar',$jumlah_barang_keluar);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
