<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.kegiatan.table',[
            'kegiatans' => Kegiatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.kegiatan.create');
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
            'tanggal'=>'required',
            'nama' => 'required',
            'file_path' => 'image|file|max:2048',
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoKegiatan');
        $validateData['id'] = auth()->user()->id;

        Kegiatan::create($validateData);

        return redirect('/dashboard/kegiatan')->with('success', 'Kegiatan telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.galeri.kegiatan.update',[
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validateData = $request->validate([
            'tanggal'=>'required',
            'nama' => 'required',
            'file_path' => 'image|file|max:2048',
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoKegiatan');
        Kegiatan::where('id', $kegiatan->id) -> update($validateData);

        return redirect('/dashboard/kegiatan')->with('success', 'Kegiatan telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->file_path){
            Storage::delete($kegiatan->file_path);
        }
        Kegiatan::destroy($kegiatan->id);

        return redirect('/dashboard/kegiatan')->with('success', 'Post telah dihapus!');
    }
}
