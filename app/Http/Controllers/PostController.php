<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd(request('image'));
        $post = new Post();
        $post->title = request('title');
        $post->description = request('description');
        if ($request->hasFile('image')){
          $filename = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
        . '-' . Str::random(5) . '.' . $request->image->getClientOriginalName();
          $post->image = $filename;
          $request->image->storeas('images',$filename,'public');
        }
        $post->save();
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        //$post = new Post()
        return view('post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('edit',compact('post'));
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
        //
        $post->title = request('title');
        $post->description = request('description');
        if ($request->hasFile('image')){
          if($post->image){
            //dd($post->image);
            Storage::delete('/public/images/' . $post->image);
          }
          $filename = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString())
        . '-' . Str::random(5) . '.' . $request->image->getClientOriginalName();
          $post->image = $filename;
          $request->image->storeas('images',$filename,'public');
        }
        $post->save();
        return view('post',compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        if($post->image){
          //dd($post->image);
          Storage::delete('/public/images/' . $post->image);
        }
        $post->delete();
        return redirect('post');
    }
}
