<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stok_barang;
use App\kategori;
use App\rak;
use App\gudang;
class stok_barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $stok_barang =stok_barang::orderBy('created_at', 'DESC')->paginate(20);
        return view('stok_barang.index', compact('stok_barang'));
    }
    public function cetakstok_barang()
    {
        $cetakstok_barang =stok_barang::all();
        return view('stok_barang.cetak_stok_barang', compact('cetakstok_barang'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $rak = rak::all();
        $gudang = gudang::all();
        return view('stok_barang.create', compact('kategori','rak','gudang'));
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
            'numeric'=> 'Data Harus Angka',
            'mimes'=> 'Data Harus Foto',
        ];

        $this->validate($request, [
            'gambar'=>'required|mimes:jpeg,png,jpg',
            'nama_barang'=>'required',
            // 'jumlah_barang'=>'required',
            // 'harga_barang'=>'required',
            // 'total'=>'required',
            'tanggal'=>'required',
            'kategori_id'=>'required',
            'rak_id'=>'required',
            'gudang_id'=>'required',
        ],$messages);
     
       $file = $request->file('gambar');
       $nama_file = time()."_".$file->getClientOriginalName();
       $tujuan_upload = 'data_gambar';
       $file->move($tujuan_upload,$nama_file);
      
       stok_barang::create([    
            'gambar'=>$nama_file,
            'nama_barang'=>$request->nama_barang,
            'harga_barang'=>$request->harga_barang= 0,
            'jumlah_barang'=>$request->jumlah_barang= 0,
            'total'=> $request->total= 0,
            'tanggal'=>$request->tanggal,
            'kategori_id'=>$request->kategori_id,
            'rak_id'=>$request->rak_id,
            'gudang_id'=>$request->gudang_id,
        ]);
        return redirect(route('stok_barang.index'))->with(['success'=>'stok barang  berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stok_barang= stok_barang::find($id);
        return view('stok_barang.show', compact('stok_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gudang = gudang::all();
        $kategori = kategori::all();
        $rak = rak::all();
        $stok_barang = stok_barang::where('id', $id)->first();
        return view('stok_barang.edit', compact('stok_barang','kategori','gudang','rak'));
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
            'mimes'=> 'Data Harus Foto',
        ];
            $this->validate($request, [
                // 'gambar'=>'required|mimes:jpeg,png,jpg',
                'nama_barang'=>'required',
                // 'jumlah_barang'=>'required',
                // 'harga_barang'=>'required',
                // 'total'=>'required',
                'tanggal'=>'required',
                'kategori_id'=>'required',
                'rak_id'=>'required',
                'gudang_id'=>'required',

        ],$messages);

    //    $file = $request->file('gambra');
    //    $nama_file = time()."_".$file->getClientOriginalName();
    //    $tujuan_upload = 'data_gambar';
    //    $file->move($tujuan_upload,$nama_file);

        $stok_barang= stok_barang::find($id);
        $stok_barang->update([    
            // 'gambar'=>$nama_file,
            'nama_barang'=>$request->nama_barang,
            'harga_barang'=>$request->harga_barang,
            'jumlah_barang'=>$request->jumlah_barang,
            'total'=> $request->total,
            'tanggal'=>$request->tanggal,
            'kategori_id'=>$request->kategori_id,
            'rak_id'=>$request->rak_id,
            'gudang_id'=>$request->gudang_id,
        ]);

        return redirect(route('stok_barang.index'))->with(['success'=>'stok barang berhasil di ubah']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        stok_barang::where('id', $id)->delete();
        return redirect(route('stok_barang.index'))->with(['success' => 'stok barang Dihapus!']);
    }
}
