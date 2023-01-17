<?php

namespace App\Http\Controllers;

use App\Models\Dataumur;
use Illuminate\Http\Request;

class DataumurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.umur.table',[
            'dataumurs' =>Dataumur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.umur.create');
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

        Dataumur::create($validateData);

        return redirect('/dashboard/dataumur')->with('success', 'Data umur telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dataumur  $dataumur
     * @return \Illuminate\Http\Response
     */
    public function show(Dataumur $dataumur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dataumur  $dataumur
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataumur $dataumur)
    {
        return view('admin.statistik.umur.update', [
            'dataumur' => $dataumur
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dataumur  $dataumur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataumur $dataumur)
    {
        $validateData = $request->validate([
            'kelompok'=>'required',
            'jumlah' => 'required|integer'
        ]);

        Dataumur::where('id', $dataumur->id) -> update($validateData);

        return redirect('/dashboard/dataumur')->with('success', 'Data umur telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dataumur  $dataumur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataumur $dataumur)
    {
        Dataumur::destroy($dataumur->id);

        return redirect('/dashboard/dataumur')->with('success', 'Data telah dihapus!');
    }
}
