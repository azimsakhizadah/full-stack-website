@extends('admin.admin_master')
@section('admin')
    <!-- Datatables  -->
<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Posts</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Auther</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                    <td>{{ $post->id}}</td>
                                    <td>{{ $post->title}}</td>
                                    <td>{{ Str::limit($post->content, 10, '...') }}</td>
                                    <td><img src="{{ asset($post->feature_image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="" style="width:70px; height:40px;"></td>
                                    <td>{{ $post->user->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('edit.post', $post->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.post', $post->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
