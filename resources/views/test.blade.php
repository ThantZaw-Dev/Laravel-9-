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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque suscipit ab, incidunt architecto adipisci necessitatibus fugiat dolores perferendis. Sapiente fugit itaque eos. Sapiente assumenda eos porro expedita recusandae qui hic?</p>
        </div>
        
    </div>
@endsection