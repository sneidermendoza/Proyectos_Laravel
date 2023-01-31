<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            "user_id" => auth()->user()->id
 //obtener el campo user_id de post ||lo buscamos en autenticados/usuarios/id
        ]+ $request->all() );

        if($request->file("file")){

            $post->imagen= $request->file("file")->store("posts","public");
            $post->save();
        }
        
        return back()->with("status","Creado con exito");
                        
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if($request->file("file")){
            Storage::disk("public")->delete((string) $post->imagen);

            $post->imagen= $request->file("file")->store("posts","public");
            $post->save();
        }
        
        return back()->with('status', 'Actualizado con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk("public")->delete((string) $post->imagen);
        $post->delete();
        return back()->with('status', 'Eliminado con exito!!');
    }
}
