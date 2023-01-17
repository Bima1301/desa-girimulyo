<?php

namespace App\Http\Controllers;

use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.statistik.table', [
            'statistiks' => Statistik::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statistik.create');
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
            'judul'=>'required|max:50',
            'total' => 'required',
            'subjudul' => 'required|max:50'
        ]);
        $validateData['id'] = auth()->user()->id;

        Statistik::create($validateData);

        return redirect('/dashboard/statistik')->with('success', 'Statistik telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function show(Statistik $statistik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistik $statistik)
    {
        return view('admin.statistik.update', [
            'statistik' => $statistik
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistik $statistik)
    {
        $validateData = $request->validate([
            'judul'=>'required|max:50',
            'total' => 'required',
            'subjudul' => 'required|max:50'
        ]);

        Statistik::where('id', $statistik->id) -> update($validateData);

        return redirect('/dashboard/statistik')->with('success', 'Statistik telah diedit!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistik  $statistik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistik $statistik)
    {
        //
    }
}
