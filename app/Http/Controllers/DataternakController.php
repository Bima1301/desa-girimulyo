<?php

namespace App\Http\Controllers;

use App\Models\Dataternak;
use Illuminate\Http\Request;

class DataternakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.ternak.table',[
            'dataternaks' => Dataternak::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.ternak.create');
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
            'jenis_ternak'=>'required',
            'jantan' => 'required|integer',
            'betina' => 'required|integer',
            'total' => 'required|integer',
        ]);
        $validateData['id'] = auth()->user()->id;

        Dataternak::create($validateData);

        return redirect('/dashboard/dataternak')->with('success', 'Data ternak telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dataternak  $dataternak
     * @return \Illuminate\Http\Response
     */
    public function show(Dataternak $dataternak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dataternak  $dataternak
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataternak $dataternak)
    {
        return view('admin.statistik.ternak.update', [
            'dataternak' => $dataternak
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dataternak  $dataternak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataternak $dataternak)
    {
        $validateData = $request->validate([
            'jenis_ternak'=>'required',
            'jantan' => 'required|integer',
            'betina' => 'required|integer',
            'total' => 'required|integer',
        ]);

        Dataternak::where('id', $dataternak->id) -> update($validateData);

        return redirect('/dashboard/dataternak')->with('success', 'Data ternak telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dataternak  $dataternak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataternak $dataternak)
    {
        Dataternak::destroy($dataternak->id);

        return redirect('/dashboard/dataternak')->with('success', 'Data telah dihapus!');
    }
}
