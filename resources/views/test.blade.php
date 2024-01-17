@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Test</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">
            <h1>Testing</h1>
        </div>
        <div class="card-body">
           @foreach ($subCategories as $sub_category)
               <p>{{ $sub_category['name'] }}</p>
               <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select type="text" name="category_id" id="category" class="form-select @error('category')
                    is-invalid
                @enderror">
                @php
                    $arr = [$sub_category['eng'], $sub_category['myn']];
                @endphp
                    @foreach ($arr as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
           @endforeach
        </div>
        
    </div>
@endsection