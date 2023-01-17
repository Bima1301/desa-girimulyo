<?php

namespace App\Http\Controllers;

use App\Models\Bagandesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BagandesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photoBagan.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Bagandesa::find(1)!=null) {
            $foto = Bagandesa::find(1);
            // dd($foto['file_path']);
            Storage::delete('public/'.$foto['file_path']);

        }

        Bagandesa::truncate();

        $validateData = $request->validate([
            'tanggal'=>'required',
            'file_path' => 'image|file|max:2048',
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoBagan');
        $validateData['id'] = auth()->user()->id;

        Bagandesa::create($validateData);

        return redirect('/dashboard')->with('success', 'Bagan desa telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bagandesa  $bagandesa
     * @return \Illuminate\Http\Response
     */
    public function show(Bagandesa $bagandesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bagandesa  $bagandesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagandesa $bagandesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bagandesa  $bagandesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagandesa $bagandesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bagandesa  $bagandesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagandesa $bagandesa)
    {
        //
    }
}
