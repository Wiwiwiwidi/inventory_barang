<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\karyawan;
class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan =karyawan::orderBy('created_at', 'DESC')->paginate(20);
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'nama_karyawan' => 'required',
        ]);

        $karyawan = karyawan::create($request->all());
        return redirect(route('karyawan.index'))->with(['Success'=>'karyawan berhasil ditambahkan']);
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
        $karyawan = karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'));
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
        $this->validate($request, [
            'nama_karyawan' => 'required',
        ]);

        $karyawan = karyawan::find($id);
        $karyawan->update([
            'nama_karyawan'=>$request->nama_karyawan,

        ]);
        return redirect(route('karyawan.index'))->with(['Success'=>'karyawan berhasil diPerbaharui']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        karyawan::where('id', $id)->delete();
        return redirect(route('karyawan.index'))->with(['Success' => 'karyawan Dihapus!']);
    }
}
