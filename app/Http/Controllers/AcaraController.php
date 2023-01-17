<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.acara.table', [
            'acaras' => Acara::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.acara.create');
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
            'tanggal' => 'required',
            'judul' => 'required',
            'file_path' => 'image|file|max:2048',
            'konten' => 'required'
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoAcara');
        $validateData['id'] = auth()->user()->id;

        Acara::create($validateData);

        return redirect('/dashboard/acara')->with('success', 'Acara telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        return view('admin.acara.update', [
            'acara' => $acara
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        $validateData = $request->validate([
            'tanggal' => 'required',
            'judul' => 'required',
            'file_path' => 'image|file|max:2048',
            'konten' => 'required'
        ]);
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoAcara');
        Acara::where('id', $acara->id)->update($validateData);

        return redirect('/dashboard/acara')->with('success', 'Acara telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acara $acara)
    {
        if ($acara->file_path) {
            Storage::delete($acara->file_path);
        }
        Acara::destroy($acara->id);

        return redirect('/dashboard/acara')->with('success', 'Post telah dihapus!');
    }

}