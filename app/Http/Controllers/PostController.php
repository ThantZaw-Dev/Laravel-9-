<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::when(request('keyword'),function($q){
            $q->where('title','like','%'.request('keyword').'%')
               ->orWhere('description','like','%'.request('keyword'). "%");
        
        })
        ->when(Auth::user()->isAuthor(), fn($q) => $q->where("user_id",Auth::id()))
        ->latest("id")->paginate(10)->withQueryString();
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, "....");
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        
       if($request->hasFile('feacture_image')){
          $newName = uniqid() . $request->feacture_image->getClientOriginalName();
          $request->file('feacture_image')->storeAs("public",$newName);
          $post->feacture_image = $newName;
       }

       $post->save();

       return to_route('posts.index')->with('status', $post->title . ' was created successufully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        Gate::authorize('update',$post);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('update',$post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if(Gate::denies('update', $post)){
            return to_route('posts.index')->with('status', 'You are not authorized to update this post');
        }
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 50, "....");
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        
       if($request->hasFile('feacture_image')){
          Storage::delete('public/' . $post->feacture_image);

          $newName = uniqid() . $request->feacture_image->getClientOriginalName();
          $request->file('feacture_image')->storeAs("public",$newName);
          $post->feacture_image = $newName;
       }

       $post->save();

       return to_route('posts.index')->with('status', $post->title . ' was updated successufully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if (! Gate::allows('delete', $post)){
            return to_route('posts.index')->with('status', 'You are not authorized to delete this post');
        }
        if(isset($post->feacture_image)){
            Storage::delete('public/' . $post->feacture_image);
        }
        $post->delete();
        return to_route('posts.index')->with('status', $post->title . ' was deleted successufully');
    }
}
