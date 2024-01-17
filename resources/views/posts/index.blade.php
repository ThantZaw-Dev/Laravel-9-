@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Posts</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
         <h4>Post Lists</h4>
         <hr>
         <div class="d-flex justify-content-between my-3">
            <div>
                @if (request('keyword'))
                   <p class="mb-0">Search By : {{ request('keyword')}} </p>
                   <a href="{{ route('posts.index')}}"> 
                    <i class="bi bi-trash3"></i> Clear Search
                   </a>
                @endif
            </div>
            <form action="{{ route('posts.index')}}" method="GET">
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
                     <th class="w-25">Title</th>
                     <th>Category</th>
                     @if(Auth::user()->role != 'author')
                        <th>Owner</th>
                     @endif
                     <th>Control</th>
                     <th>Created</th>
                 </tr>
            </thead>
             <tbody>
                 @forelse ($posts as $post)
                     <tr>
                         <td>{{ $post->id }}</td>
                         <td>
                             {{ $post->title }}
                         </td>
                         <td>
                            @inject('category', "App\Models\Category")
                            {{ $category::find($post->category_id)->title }}
                         </td>

                           @notAuthor
                            <td>
                              {{ App\Models\User::find($post->user_id)->name }}
                           </td>
                           @endnotAuthor
                        
                            {{-- @if(Auth::user()->role != 'author')
  
                            @endif --}}
                        
                         <td>
                            @can('update', $post)
                            <a href="{{ route('posts.edit', $post->id )}}" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @endcan
                            <a href="{{ route('posts.show', $post->id )}}" class="btn btn-outline-dark btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id)}}" class="d-inline-block" method="post">
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
                                 {{ $post->created_at->format("d M Y ")}}
                             </p>
                             <p class="small mb-0 text-black-50">
                                 <i class="bi bi-clock"></i>
                                 {{ $post->created_at->format("h : m A ")}}
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
            {{ $posts->onEachSide(1)->links() }}
         </div>
        </div>
     </div>
@endsection