<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Post;
use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Carbon\Carbon;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentTime = Carbon::now();
        date_default_timezone_set('Asia/Jakarta');
        $polikliniks = Poliklinik::all();
        return view('posts.create' , compact('polikliniks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(array_merge($request->only('tanggal', 'no_antrian', 'nama_pasien', 'poli_id', 'alamat_pasien', 'no_telp_pasien')));

        return redirect()->route('posts.index')
            ->withSuccess(__('Pasien created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
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
        $polikliniks = Poliklinik::all();
        return view('posts.edit', compact('polikliniks'), [
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
        $post->update($request->only('tanggal', 'no_antrian', 'nama_pasien', 'poli_id', 'alamat_pasien', 'no_telp_pasien'));

        return redirect()->route('posts.index')
            ->withSuccess(__('Pasien updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
}