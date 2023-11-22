@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('posts.index') }}">Manage Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
              <h3>{{ $post->title }}</h3>
              <hr>
             <div class="w-100 d-flex justify-content-between">
                <div>
                    <span class="badge bg-secondary">{{ App\Models\User::find($post->user_id)->name }}</span>
                    <span class="badge bg-secondary">{{ App\Models\Category::find($post->category_id)->title }}</span>
                </div>
                <span class="text-danger">{{ $post->created_at->diffForHumans()}} </span>
             </div>
             @isset($post->feacture_image)
                 <img src="{{ asset('storage/' . $post->feacture_image ) }}" alt="" class="w-25 my-3">
             @endisset
              <p>{{ $post->description }}</p>
              <hr>
              <div class="d-flex justify-content-between">
                <a href="{{ route('posts.create')}}" class="btn btn-primary btn-sm">Create Posts</a>
                <a href="{{ route('posts.edit' , $post->id )}}" class="btn btn-primary btn-sm">Edit Post</a>
              </div>
        </div>
     </div>
@endsection