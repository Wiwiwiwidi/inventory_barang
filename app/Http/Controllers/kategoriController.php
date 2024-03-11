<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use session;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $kategori = kategori::all(); 
        $kategori =kategori::orderBy('created_at', 'DESC')->paginate(20);
        return view ('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'unique' => 'Nama Kategori sudah ada',
        ];
        
        $this->validate($request, [
            'nama_kategori' => 'required|string|max:150|unique:kategoris,nama_kategori'
        ],$messages);

        $kategori = kategori::create($request->all());
    
        return redirect(route('kategori.index'))->with(['success','kategori berhasil ditambah']);

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
        $kategori = kategori::find($id);
        return view('kategori.edit', compact('kategori'));
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
            'unique' => 'Nama Kategori sudah ada',
        ];
        
        $this->validate($request, [
            'nama_kategori' => 'required|string|max:150|unique:kategoris,nama_kategori,'. $id
        ],$messages);
        
        $kategori = kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect(route('kategori.index'))->with(['success','kategori berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kategori::where('id', $id)->delete();
        return redirect(route('kategori.index'))->with(['success','kategori Dihapus!']);
    }
}
