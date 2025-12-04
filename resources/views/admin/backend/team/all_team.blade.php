@extends('admin.admin_master')
@section('admin')
    <!-- Datatables  -->
<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Team Members</h4>
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
                                    <th>Bio</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team_members as $member)
                                    <tr>
                                    <td>{{ $member->id}}</td>
                                    <td>{{ $member->name}}</td>
                                    <td>{{ $member->position}}</td>
                                    <td><img src="{{ asset($member->image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="" style="width:70px; height:40px;"></td>
                                    <td>{{ Str::limit($member->bio, 30, '...') }}</td>
                                    <td>
                                        <a href="{{ route('edit.team', $member->id)}}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.team', $member->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                        <a href="{{ route('add.team')}}" class="btn btn-primary">Add</a>
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
