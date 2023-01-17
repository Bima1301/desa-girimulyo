<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tentangDesa.table',[
            'strukturs' => Struktur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tentangDesa.create');
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
            'nama'=>'required|max:100',
            'jabatan' => 'required|max:50',
        ]);
        $validateData['id'] = auth()->user()->id;

        Struktur::create($validateData);

        return redirect('/dashboard/struktur')->with('success', 'Struktur telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function show(Struktur $struktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function edit(Struktur $struktur)
    {
        return view('admin.tentangDesa.update',[
            'struktur' => $struktur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struktur $struktur)
    {
        $validateData = $request->validate([
            'nama'=>'required|max:100',
            'jabatan' => 'required|max:50',
        ]);

        Struktur::where('id', $struktur->id) -> update($validateData);

        return redirect('/dashboard/struktur')->with('success', 'Struktur telah ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $struktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struktur $struktur)
    {
        Struktur::destroy($struktur->id);

        return redirect('/dashboard/struktur')->with('success', 'Struktur telah dihapus!');
    }
}
