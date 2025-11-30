@extends('admin.admin_master')
@section('admin')
    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Review</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('update.review', $review->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $review->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Position</label>
                                            <input type="text" id="position" name="position" class="form-control"
                                                value="{{ $review->position }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">User Image</label>
                                            <input type="file" id="image" name="image" class="form-control">

                                            @if ($review->image)
                                                <img src="{{ asset($review->image) }}" width="80" class="mt-2">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5">{{ $review->message }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Review</button>
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
