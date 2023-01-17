<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.profilKades.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profilKades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Photo::find(1)!=null) {
            $foto = Photo::find(1);
            // dd($foto['file_path']);
            Storage::delete('public/'.$foto['file_path']);

        }

        Photo::truncate();

        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'motto' => 'required|max:255',
            'file_path' => 'image|file|max:2048'
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoKades');
        $validateData['id'] = auth()->user()->id;

        Photo::create($validateData);

        return redirect('/dashboard')->with('success', 'Bagan desa telah ditambahkan!');
        // if (Photo::find(1)!=null) {
        //     $foto = Photo::find(1);
        //     // dd($foto['file_path']);
        //     Storage::delete('public/photo/'.$foto['file_path']);

        // }

        // Photo::truncate();

        // // (new Photo)->newQuery()->delete();
        // // $validateData = $request->validate([
        // //     'nama' => 'required|max:255',
        // //     'motto' => 'required|max:255',
        // //     'file' => 'image|file|max:2048'
        // // ]);
        // // $validateData['id'] = auth()->user()->id;

        // // Photo::create($validateData);
        // // return redirect('/dashboard')->with('success', 'Profil telah ditambahkan!');
        // $request->validate([
        //     'nama' => 'required',
        //     'motto' =>'required',
        // ]);
        // if ($request->hasFile('file')) {

        //     $request->validate([
        //         'image' => 'mimes:jpeg,bmp,png|file|max:2048' // Only allow .jpg, .bmp and .png file types.
        //     ]);

        //     // Save the file locally in the storage/public/ folder under a new folder named /product
        //     $request->file->store('photo', 'public');

        //     // Store the record, using the new file hashname which will be it's new filename identity.
        //     $photo = new Photo([
        //         "nama" => $request->get('nama'),
        //         'motto'=>$request->get('motto'),
        //         "file_path" => $request->file->hashName()
        //     ]);
        //     $photo->save(); // Finally, save the record.
        // }
        // return view('web.indexAdmin');
        // $foto = Photo::all();
        // dd($foto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
