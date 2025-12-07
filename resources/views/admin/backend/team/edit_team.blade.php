@extends('admin.admin_master')
@section('admin')
    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Team Member</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('update.team', $team_members->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $team_members->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Position</label>
                                            <input type="position" id="position" name="position" class="form-control"
                                                value="{{ $team_members->position }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Image</label>
                                            <input type="file" id="image" name="image" class="form-control">

                                            @if ($team_members->image)
                                                <img src="{{ asset($team_members->image) }}" width="80" class="mt-2">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Biography</label>
                                            <textarea class="form-control" type='text' name="bio" id="bio" cols="30" rows="10" value="{{ $team_members->bio }}"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Linkedin</label>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control"
                                                value="{{ $team_members->linkedin }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Github</label>
                                            <input type="text" id="github" name="github" class="form-control"
                                                value="{{ $team_members->github }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" id="instagram" name="instagram" class="form-control"
                                                value="{{ $team_members->instagram }}">
                                        </div>

                                    

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
