<?php

namespace App\Http\Controllers;

use App\Models\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.perangkat.table',[
            'perangkats' => Perangkat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.perangkat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'jabatan' => 'required',
            'file_path' => 'image|file|max:2048',
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoPerangkat');
        $validateData['id'] = auth()->user()->id;

        Perangkat::create($validateData);

        return redirect('/dashboard/perangkat')->with('success', 'Perangkat telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function show(Perangkat $perangkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Perangkat $perangkat)
    {
        return view('admin.galeri.perangkat.update',[
            'perangkat' => $perangkat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perangkat $perangkat)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'jabatan' => 'required',
            'file_path' => 'image|file|max:2048',
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoPerangkat');
        Perangkat::where('id', $perangkat->id) -> update($validateData);

        return redirect('/dashboard/perangkat')->with('success', 'Perangkat telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perangkat  $perangkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perangkat $perangkat)
    {
        if($perangkat->file_path){
            Storage::delete($perangkat->file_path);
        }
        Perangkat::destroy($perangkat->id);

        return redirect('/dashboard/perangkat')->with('success', 'Post telah dihapus!');
    }
}
