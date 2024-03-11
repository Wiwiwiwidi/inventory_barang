<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang_keluar;
use App\stok_barang;

date_default_timezone_set('Asia/Jakarta');

class barang_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluar =barang_keluar::orderBy('created_at', 'DESC')->paginate(20);
        return view('barang_keluar.index', compact('barang_keluar'));
    }
    public function cetakbarang_keluar()
    {
        $dtbarang_keluar =barang_keluar::all();
        return view('barang_keluar.cetak-barang_keluar', compact('dtbarang_keluar'));
    }

    public function cetakbarang_keluar_form()
    {
        return view('barang_keluar.cetak-barang_keluar-form',compact('cetakbarang_keluar_form'));
    }

    public function cetakbarang_keluar_pertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakpertanggal= barang_keluar::with('stok_barang')->whereBetween('tgl_keluar',[$tglawal, $tglakhir])->get();
        return view('barang_keluar.cetak-barang_keluar-pertanggal',compact('cetakpertanggal'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stok_barang = stok_barang::all();
        return view('barang_keluar.create', compact('stok_barang'));
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
            'jumlah_keluar' =>'required|numeric',
            'tgl_keluar' =>'required',
            'keterangan' =>'required',
            'stok_barang_id'=>'required',

        ],$messages);

        $stok_barang = stok_barang::find($request->stok_barang_id);

        if($stok_barang->jumlah_barang < $request->jumlah_keluar)
        {
            return redirect(route('barang_keluar.create'))->with(['error'=>'jumlah keluar melebihi stok']);
        }
        else
        {
            barang_keluar::create([
                'jumlah_keluar'=>$request->jumlah_keluar,
                'tgl_keluar' =>$request->tgl_keluar,
                'keterangan' =>$request->keterangan,
                'stok_barang_id'=>$request->stok_barang_id,
            ]);

            $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
            $stok_barang->jumlah_barang -= $request->jumlah_keluar;
            $stok_barang->save();
        }
        return redirect(route('barang_keluar.index'))->with(['success'=>'barang keluar berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang_keluar= barang_keluar::find($id);
        return view('barang_keluar.show', compact('barang_keluar'));
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
        $barang_keluar = barang_keluar::where('id', $id)->first();
        return view('barang_keluar.edit', compact('barang_keluar','stok_barang'));
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
            'numeric' => 'Data Harus Angka',
        ];

        $this->validate($request, [
            'jumlah_keluar' =>'required|numeric',
            'tgl_keluar' =>'required',
            'keterangan' =>'required',
            'stok_barang_id'=>'required',

        ],$messages);
        
        $stok_barang = stok_barang::findOrFail($request->stok_barang_id);
        $stok_barang->jumlah_barang -= $request->jumlah_keluar;
        $stok_barang->update();
        
        $barang_keluar= barang_keluar::find($id);
        $barang_keluar->update([    
            'jumlah_keluar'=>$request->jumlah_keluar,
            'tgl_keluar' =>$request->tgl_keluar,
            'keterangan' =>$request->keterangan,
            'stok_barang_id'=>$request->stok_barang_id,
        ]);
        return redirect(route('barang_keluar.index'))->with(['success'=>'barang keluar berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang_keluar::where('id', $id)->delete();
        return redirect(route('barang_keluar.index'))->with(['success' => 'barang keluar Dihapus!']);
    }
}
