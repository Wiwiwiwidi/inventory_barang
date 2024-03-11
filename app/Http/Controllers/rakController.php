<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rak;
use Illuminate\Support\Facades\Session;
class rakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak =rak::orderBy('created_at', 'DESC')->paginate(20);
        return view ('rak.index', compact('rak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('rak.create');
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
            'nama_rak' => 'required|string'
        ]);
        
        $rak = rak::create($request->all());
        return redirect(route('rak.index'))->with(['success','rak berhasil ditambahkan']);
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
        $rak = rak::find($id);
        return view('rak.edit', compact('rak'));
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
            'nama_rak' => 'required|string',
        ]);
        
        $rak = rak::find($id);
        $rak->update([
            'nama_rak' => $request->nama_rak
        ]);

        return redirect(route('rak.index'))->with(['success','rak berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        rak::where('id', $id)->delete();
        return redirect(route('rak.index'))->with(['success','rak Dihapus!']);
    }
}
