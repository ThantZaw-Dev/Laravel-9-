@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
        </ol>
    </nav>
    <div class="card">
       
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id )}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <input type="text" 
                                name="title"
                                class="form-control @error('title')
                                   is-invalid
                                @enderror" 
                                id="exampleFormControlInput1"
                                value="{{ old('title', $category->title ) }}"
                            >
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
@endsection