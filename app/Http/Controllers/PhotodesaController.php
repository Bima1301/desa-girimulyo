<?php

namespace App\Http\Controllers;

use App\Models\Photodesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PhotodesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.galeri.photoDesa.table',[
            'photodesas' => Photodesa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galeri.photoDesa.create');

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
            'file_path' => 'image|file|max:2048',
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoDesa');
        $validateData['id'] = auth()->user()->id;

        Photodesa::create($validateData);

        return redirect('/dashboard/photodesa')->with('success', 'Photo desa telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photodesa  $photodesa
     * @return \Illuminate\Http\Response
     */
    public function show(Photodesa $photodesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photodesa  $photodesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Photodesa $photodesa)
    {
        return view('admin.galeri.photoDesa.update',[
            'photodesa' => $photodesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photodesa  $photodesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photodesa $photodesa)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'file_path' => 'image|file|max:2048',
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoDesa');
        Photodesa::where('id', $photodesa->id) -> update($validateData);

        return redirect('/dashboard/photodesa')->with('success', 'Photo desa telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photodesa  $photodesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photodesa $photodesa)
    {
        if($photodesa->file_path){
            Storage::delete($photodesa->file_path);
        }
        Photodesa::destroy($photodesa->id);

        return redirect('/dashboard/photodesa')->with('success', 'Photo telah dihapus!');
    }
}
