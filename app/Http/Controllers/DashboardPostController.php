<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.table', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'tanggal'=>'required|max:50',
            'judul_berita' => 'required|max:255',
            'konten' => 'required',
            'file_path' => 'image|file|max:2048'
        ]);
        $validateData['file_path'] = $request->file('file_path')->store('photoBerita');
        $validateData['id'] = auth()->user()->id;

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.blog', [
            'post' => $post,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validateData = $request->validate([
            'tanggal'=>'required|max:50',
            'judul_berita' => 'required|max:255',
            'konten' => 'required',
            'file_path' => 'image|file|max:2048'
        ]);
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validateData['file_path'] = $request->file('file_path')->store('photoBerita');
        Post::where('id', $post->id) -> update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post telah diedit!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->file_path){
            Storage::delete($post->file_path);
        }
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post telah dihapus!');
    }
}
