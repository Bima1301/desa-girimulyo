<?php

namespace App\Http\Controllers;

use App\Models\Datavaksin;
use Illuminate\Http\Request;

class DatavaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.vaksin.table',[
            'datavaksins' =>Datavaksin::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.vaksin.create');
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
            'kelompok'=>'required',
            'jumlah' => 'required|integer',
        ]);
        $validateData['id'] = auth()->user()->id;

        Datavaksin::create($validateData);

        return redirect('/dashboard/datavaksin')->with('success', 'Data vaksin telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datavaksin  $datavaksin
     * @return \Illuminate\Http\Response
     */
    public function show(Datavaksin $datavaksin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datavaksin  $datavaksin
     * @return \Illuminate\Http\Response
     */
    public function edit(Datavaksin $datavaksin)
    {
        return view('admin.statistik.vaksin.update', [
            'datavaksin' => $datavaksin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datavaksin  $datavaksin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datavaksin $datavaksin)
    {
        $validateData = $request->validate([
            'kelompok'=>'required',
            'jumlah' => 'required|integer'
        ]);

        Datavaksin::where('id', $datavaksin->id) -> update($validateData);

        return redirect('/dashboard/datavaksin')->with('success', 'Data vaksin telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datavaksin  $datavaksin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datavaksin $datavaksin)
    {
        Datavaksin::destroy($datavaksin->id);

        return redirect('/dashboard/datavaksin')->with('success', 'Data telah dihapus!');
    }
}
