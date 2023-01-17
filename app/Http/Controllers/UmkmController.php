<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.umkm.table',[
            'umkms' => Umkm::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.umkm.create');
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
            'deskripsi' => 'required',
            'file_path' => 'image|file|max:2048',
            'alamat' => 'required'
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoUmkm');
        $validateData['id'] = auth()->user()->id;

        Umkm::create($validateData);

        return redirect('/dashboard/umkm')->with('success', 'UMKM telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function show(Umkm $umkm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.update',[
            'umkm' => $umkm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umkm $umkm)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'deskripsi' => 'required',
            'file_path' => 'image|file|max:2048',
            'alamat' => 'required'
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoUmkm');
        Umkm::where('id', $umkm->id) -> update($validateData);

        return redirect('/dashboard/umkm')->with('success', 'UMKM telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umkm $umkm)
    {
        if($umkm->file_path){
            Storage::delete($umkm->file_path);
        }
        Umkm::destroy($umkm->id);

        return redirect('/dashboard/umkm')->with('success', 'Post telah dihapus!');
    }
}
