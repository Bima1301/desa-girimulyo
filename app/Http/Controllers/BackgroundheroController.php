<?php

namespace App\Http\Controllers;

use App\Models\Backgroundhero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hero.table',[
            'backgroundheros' => Backgroundhero::all()
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hero.create');
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
            'nama'=>'required',
            'file_path' => 'image|file|max:10240',
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoHero');
        $validateData['id'] = auth()->user()->id;

        Backgroundhero::create($validateData);

        return redirect('/dashboard/backgroundhero')->with('success', 'Background telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backgroundhero  $backgroundhero
     * @return \Illuminate\Http\Response
     */
    public function show(Backgroundhero $backgroundhero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backgroundhero  $backgroundhero
     * @return \Illuminate\Http\Response
     */
    public function edit(Backgroundhero $backgroundhero)
    {
        return view('admin.hero.update',[
            'backgroundhero' => $backgroundhero
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backgroundhero  $backgroundhero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backgroundhero $backgroundhero)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'file_path' => 'image|file|max:10240',
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoHero');
        Backgroundhero::where('id', $backgroundhero->id) -> update($validateData);

        return redirect('/dashboard/backgroundhero')->with('success', 'Background telah diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backgroundhero  $backgroundhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backgroundhero $backgroundhero)
    {
        if($backgroundhero->file_path){
            Storage::delete($backgroundhero->file_path);
        }
        Backgroundhero::destroy($backgroundhero->id);

        return redirect('/dashboard/backgroundhero')->with('success', 'Background telah dihapus!');
    }
}
