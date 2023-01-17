<?php

namespace App\Http\Controllers;

use App\Models\Datapendidikan;
use Illuminate\Http\Request;

class DatapendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.pendidikan.table',[
            'datapendidikans' =>Datapendidikan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.pendidikan.create');
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
            'kelompok' => 'required',
            'jumlah' => 'required|integer'
        ]);
        $validateData['id'] = auth()->user()->id;
        
        Datapendidikan::create($validateData);

        return redirect('/dashboard/datapendidikan')->with('success', 'Data pendidikan telah ditambahkan!');
    }   



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datapendidikan  $datapendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Datapendidikan $datapendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datapendidikan  $datapendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Datapendidikan $datapendidikan)
    {
        return view('admin.statistik.pendidikan.update',[
            'datapendidikan' => $datapendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datapendidikan  $datapendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datapendidikan $datapendidikan)
    {
        $validateData = $request->validate([
            'kelompok' => 'required',
            'jumlah' => 'required|integer'
        ]);
        Datapendidikan::where('id',$datapendidikan->id)-> update($validateData);

        return redirect('/dashboard/datapendidikan')->with('success', 'Datapendidikan telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datapendidikan  $datapendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datapendidikan $datapendidikan)
    {
        Datapendidikan::destroy($datapendidikan->id);

        return redirect('/dashboard/datapendidikan')->with('success', 'Data telah dihapus!');
    }
}
