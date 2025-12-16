@extends('admin.admin_master')
@section('admin')
<div class="container-xxl">

    <h4 class="mb-4">Edit Post Category</h4>

    {{-- Show Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('post-categories.update', $post_category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $post_category->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>

</div>
@endsection
