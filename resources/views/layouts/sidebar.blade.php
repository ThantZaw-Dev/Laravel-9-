<div class="list-group mb-3">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
        Home
    </a>
    <a href="{{ route('test') }}" class="list-group-item list-group-item-action">
        test
    </a>
</div>

<p class="small text-black-50">Manage Posts</p>
<div class="list-group mb-3">
    <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action">
        Post Lists
    </a>
    <a href="{{ route('posts.create') }}" class="list-group-item list-group-item-action">
        Post Create
    </a>
</div>

<p class="small text-black-50">Manage Categories</p>
<div class="list-group mb-3">
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">
        Category Lists
    </a>
    <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action">
        Create Category
    </a>
</div>

@admin
<p class="small text-black-50">Manage Users</p>
<div class="list-group mb-3">
    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
        User Lists
    </a>
    <a href="{{ route('users.create') }}" class="list-group-item list-group-item-action">
        Create User
    </a>
</div>
@endadmin
