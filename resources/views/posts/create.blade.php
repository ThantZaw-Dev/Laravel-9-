@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Posts</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <h4>Create New Post</h4>
        </div>
        <div class="card-body">
           <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('title')
                        is-invalid
                    @enderror" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Select Category</label>
                    <select type="text" name="category_id" id="category" class="form-select @error('category')
                        is-invalid
                    @enderror">
                        @foreach (\App\Models\Category::all() as $category)
                            <option 
                              value="{{ $category->id }}" 
                              {{ $category->id == old('category') ? 'selected' : ''}}>
                              {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" rows="5" id="description" class="form-control @error('description')
                        is-invalid
                    @enderror" value="">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <label for="file" class="form-label">Images</label>
                        <input type="file" name="feacture_image" id="file" class="form-control @error('feacture_image')
                            is-invalid
                        @enderror">
                        @error('feacture_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </div>
                </div>
           </form>
        </div>
    </div>
@endsection