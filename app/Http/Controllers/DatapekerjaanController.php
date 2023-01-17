<?php

namespace App\Http\Controllers;

use App\Models\Datapekerjaan;
use Illuminate\Http\Request;

class DatapekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.pekerjaan.table',[
            'datapekerjaans' =>Datapekerjaan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.pekerjaan.create');
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

        Datapekerjaan::create($validateData);

        return redirect('/dashboard/datapekerjaan')->with('success', 'Data pekerjaan telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datapekerjaan  $datapekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Datapekerjaan $datapekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datapekerjaan  $datapekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Datapekerjaan $datapekerjaan)
    {
        return view('admin.statistik.pekerjaan.update', [
            'datapekerjaan' => $datapekerjaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datapekerjaan  $datapekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datapekerjaan $datapekerjaan)
    {
        $validateData = $request->validate([
            'kelompok'=>'required',
            'jumlah' => 'required|integer'
        ]);

        Datapekerjaan::where('id', $datapekerjaan->id) -> update($validateData);

        return redirect('/dashboard/datapekerjaan')->with('success', 'Data pekerjaan telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datapekerjaan  $datapekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datapekerjaan $datapekerjaan)
    {
        Datapekerjaan::destroy($datapekerjaan->id);

        return redirect('/dashboard/datapekerjaan')->with('success', 'Data telah dihapus!');
    }
}
