<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gudang;
class gudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gudang =gudang::orderBy('created_at', 'DESC')->paginate(20);
        return view ('gudang.index', compact('gudang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_gudang' => 'required|string',
            'lokasi' => 'required|string',
        ]);
        
        $gudang = gudang::create($request->all());
        return redirect(route('gudang.index'))->with(['gudang Ditambah','gudang berhasil ditambahkan']);
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
        $gudang = gudang::find($id);
        return view('gudang.edit', compact('gudang'));
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
            'nama_gudang' => 'required|string',
            'lokasi' => 'required|string',
        ],$messages);

        $gudang = gudang::find($id);
        $gudang->update([
            'nama_gudang'=>$request->nama_gudang,
            'lokasi'=>$request->lokasi,
        ]);
        return redirect(route('gudang.index'))->with(['Success'=>'gudang berhasil diPerbaharui']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        gudang::where('id', $id)->delete();
        return redirect(route('gudang.index'))->with(['gudang Dihapus','gudang Dihapus!']);
    }
}
