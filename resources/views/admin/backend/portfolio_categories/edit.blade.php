@extends('admin.admin_master')
@section('admin')
<div class="container-xxl">

    <h4 class="mb-4">Edit Portfolio Category</h4>

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

    <form action="{{ route('portfolio-categories.update', $portfolio_category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $portfolio_category->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>

</div>
@endsection
