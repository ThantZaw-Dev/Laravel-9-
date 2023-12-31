@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage User</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
         <h4>User Lists</h4>
         <hr>
         <div class="d-flex justify-content-between my-3">
            <div>
                @if (request('keyword'))
                   <p class="mb-0">Search By : {{ request('keyword')}} </p>
                   <a href="{{ route('users.index')}}"> 
                    <i class="bi bi-trash3"></i> Clear Search
                   </a>
                @endif
            </div>
            <form action="{{ route('users.index')}}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Search" required>
                    <button type="submit" class="btn btn-secondary">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
                
            </form>
         </div>
         <table class="table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th class="w-25">Name</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th>Control</th>
                     <th>Created</th>
                 </tr>
            </thead>
             <tbody>
                 @forelse ($users as $user)
                     <tr>
                         <td>{{ $user->id }}</td>
                         <td>
                             {{ $user->name }}
                         </td>
                         <td>
                            
                            {{ $user->email }}
                         </td>
                         <td>
                            {{ $user->role }}
                         </td>
                         <td>
                            @can('update', $user)
                            <a href="{{ route('users.edit', $user->id )}}" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @endcan

                            <a href="{{ route('users.show', $user->id )}}" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('delete', $user)
                            <form action="{{ route('users.destroy', $user->id)}}" class="d-inline-block" method="POST">
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
                                 {{ $user->created_at->format("d M Y ")}}
                             </p>
                             <p class="small mb-0 text-black-50">
                                 <i class="bi bi-clock"></i>
                                 {{ $user->created_at->format("h : m A ")}}
                             </p>
                         </td>
                     </tr>
                 @empty
                     <tr>
                        <td colspan="6" class="text-center">No Search Found!</td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
         <div>
            {{ $users->onEachSide(1)->links() }}
         </div>
        </div>
     </div>
@endsection