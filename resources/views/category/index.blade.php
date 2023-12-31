@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
        </ol>
    </nav>
    <div class="card">
       <div class="card-body">
        <h4>Category Lists</h4>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>Owner</th>
                    <th>Control</th>
                    <th>Created</th>
                </tr>
           </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            {{ $category->title }}
                            <br>
                            <span class="badge bg-secondary">{{ $category->slug}}</span>
                        </td>
                        <td>
                            {{ App\Models\User::find($category->user_id)->name }}
                        </td>
                        <td>
                            @can('update', $category)
                            <a href="{{ route('category.edit', $category->id )}}" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @endcan
                            @can('delete', $category)
                            <form action="{{ route('category.destroy', $category->id)}}" class="d-inline-block" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-outline-dark btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                        <td>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-calendar"></i>
                                {{ $category->created_at->format("d M Y ")}}
                            </p>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-clock"></i>
                                {{ $category->created_at->format("h : m A ")}}
                            </p>
                        </td>
                    </tr>
                @empty
                    
                @endforelse

            </tbody>
        </table>
       </div>
    </div>
@endsection