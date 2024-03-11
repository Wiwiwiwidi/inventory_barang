<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_masuk;
use App\stok_barang;
use App\pemasok;

date_default_timezone_set('Asia/Jakarta');

class barang_masukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk =barang_masuk::orderBy('created_at', 'DESC')->paginate(20);
        return view('barang_masuk.index', compact('barang_masuk'));
    }
    public function cetakbarang_masuk()
    {
        $dtbarang_masuk =barang_masuk::all();
        return view('barang_masuk.cetak-barang_masuk', compact('dtbarang_masuk'));
    }
    public function cetakbarang_masuk_form()
    {
        return view('barang_masuk.cetak-barang_masuk-form',compact('cetakbarang_masuk_form'));
    }

    public function cetakbarang_masuk_pertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal= barang_masuk::with('stok_barang')->whereBetween('tgl_masuk',[$tglawal, $tglakhir])->get();
        return view('barang_masuk.cetak-barang_masuk-pertanggal',compact('cetakpertanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stok_barang = stok_barang::all();
        $pemasok = pemasok::all();
        return view('barang_masuk.create', compact('stok_barang','pemasok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Tidak boleh kosong',
            'numeric' => 'Data Harus Angka',
        ];
        
        $this->validate($request, [
            'jumlah_masuk' =>'required|numeric',
            'harga' =>'required|numeric',
            'total' =>'required|numeric',
            'tgl_masuk' =>'required',
            'stok_barang_id'=>'required',
            'pemasok_id'=>'required',
        ],$messages);

        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->jumlah_barang += $request->jumlah_masuk;
        $stok_barang->save();

        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->harga_barang += $request->harga;
        $stok_barang->save();

        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->total += $request->total;
        $stok_barang->save();
        
        barang_masuk::create([
            'jumlah_masuk'=>$request->jumlah_masuk,
            'harga'=>$request->harga,
            'total'=>$request->total,
            'tgl_masuk' =>$request->tgl_masuk,
            'stok_barang_id'=>$request->stok_barang_id,
            'pemasok_id'=>$request->pemasok_id,
        ]);
       
        return redirect(route('barang_masuk.index'))->with(['success'=>'Barang Masuk berhasil ditambahkan']);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_masuk= barang_masuk::find($id);
        return view('barang_masuk.show', compact('barang_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stok_barang = stok_barang::all();
        $pemasok = pemasok::all();
        $barang_masuk = barang_masuk::where('id', $id)->first();
        return view('barang_masuk.edit', compact('barang_masuk','stok_barang','pemasok'));
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
        $messages = [
            'required' => 'Tidak boleh kosong',
            'numeric'=> 'Data Harus Angka',
        ];

        $this->validate($request, [
            'jumlah_masuk' =>'required|numeric',
            'total' =>'required|numeric',
            'tgl_masuk' =>'required',
            'stok_barang_id'=>'required',
            'pemasok_id'=>'required',
        ],$messages);
        
        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->jumlah_barang = $request->jumlah_masuk;
        $stok_barang->update();

        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->harga_barang = $request->harga;
        $stok_barang->update();

        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->total = $request->total;
        $stok_barang->update();

        $barang_masuk= barang_masuk::find($id);
        $barang_masuk->update([    
            'jumlah_masuk'=>$request->jumlah_masuk,
            'total'=>$request->total,
            'tgl_masuk' =>$request->tgl_masuk,
            'stok_barang_id'=>$request->stok_barang_id,
            'pemasok_id'=>$request->pemasok_id,
        ]);
        return redirect(route('barang_masuk.index'))->with(['success'=>'Barang Masuk berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang_masuk::where('id', $id)->delete();
        return redirect(route('barang_masuk.index'))->with(['success' => 'Barang Masuk Dihapus!']);
    }

    
    
}
