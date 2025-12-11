@extends('admin.admin_master')
@section('admin')
<div class="container">
    <h3>All Portfolio Categories</h3>
    <a href="{{ route('portfolio-categories.create') }}" class="btn btn-success mb-2">Add Category</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td>
                    <a href="{{ route('portfolio-categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('portfolio-categories.destroy', $cat->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
