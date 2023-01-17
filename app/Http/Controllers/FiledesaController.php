<?php

namespace App\Http\Controllers;

use App\Models\Filedesa;
use Illuminate\Http\Request;

class FiledesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.administrasi.table',[
            'filedesas' => Filedesa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrasi.create');
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
            'nama'=>'required|max:50',
            'link' => 'required'
        ]);
        $validateData['id'] = auth()->user()->id;

        Filedesa::create($validateData);

        return redirect('/dashboard/filedesa')->with('success', 'File telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filedesa  $filedesa
     * @return \Illuminate\Http\Response
     */
    public function show(Filedesa $filedesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filedesa  $filedesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Filedesa $filedesa)
    {
        return view('admin.administrasi.update',[
            'filedesa' => $filedesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filedesa  $filedesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filedesa $filedesa)
    {
        $validateData = $request->validate([
            'nama'=>'required|max:50',
            'link' => 'required'
        ]);

        Filedesa::where('id', $filedesa->id) -> update($validateData);

        return redirect('/dashboard/filedesa')->with('success', 'File telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filedesa  $filedesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filedesa $filedesa)
    {
        Filedesa::destroy($filedesa->id);

        return redirect('/dashboard/filedesa')->with('success', 'Data telah dihapus!');
    }
}
