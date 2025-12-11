@extends('admin.admin_master')
@section('admin')
    <!-- Datatables  -->
<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Portfolio</h4>
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
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Client</th>
                                    <th>Duratoin</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                    <td>{{ $portfolio->id}}</td>
                                    <td>{{ $portfolio->title}}</td>
                                    <td>{{ Str::limit($portfolio->description, 10, '...') }}</td>
                                    <td><img src="{{ asset($portfolio->image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="" style="width:70px; height:40px;"></td>
                                    <td>{{ $portfolio->client}}</td>
                                    <td>{{ $portfolio->duration}}</td>
                                    <td>{{ $portfolio->website}}</td>
                                    <td>
                                        <a href="{{ route('edit.portfolio', $portfolio->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.portfolio', $portfolio->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
