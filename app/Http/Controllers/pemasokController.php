<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pemasok;
class pemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok =pemasok::orderBy('created_at', 'DESC')->paginate(20);
        return view('pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.create');
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
            'numeric'=> 'No Telepon Harus Angka',

        ];
        $this->validate($request, [
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
        ],$messages);

        $pemasok = pemasok::create($request->all());
        return redirect(route('pemasok.index'))->with(['Success'=>'pemasok berhasil ditambahkan']);
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
        $pemasok = pemasok::find($id);
        return view('pemasok.edit', compact('pemasok'));
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
            'nama_pemasok' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
        ],$messages);

        $pemasok = pemasok::find($id);
        $pemasok->update([
            'nama_pemasok'=>$request->nama_pemasok,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,

        ]);
        return redirect(route('pemasok.index'))->with(['Success'=>'pemasok berhasil diPerbaharui']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pemasok::where('id', $id)->delete();
        return redirect(route('pemasok.index'))->with(['Success' => 'Pemasok Dihapus!']);
    }
}
