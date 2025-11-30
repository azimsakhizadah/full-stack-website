@extends('admin.admin_master')
@section('admin')
    <!-- Datatables  -->
<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Review</h4>
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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                    <td>{{ $review->id}}</td>
                                    <td>{{ $review->name}}</td>
                                    <td>{{ $review->position}}</td>
                                    <td><img src="{{ asset($review->image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="" style="width:70px; hieght:40px;"></td>
                                    <td>{{ Str::limit($review->message, 30, '...') }}</td>
                                    <td>
                                        <a href="{{ route('edit.review', $review->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.review', $review->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                        <a href="{{ route('add.review')}}" class="btn btn-primary">Add</a>
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
