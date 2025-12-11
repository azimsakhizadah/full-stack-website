@extends('admin.admin_master')
@section('admin')
    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Portfolio</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form action="{{ route('update.portfolio', $portfolio->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                value="{{ $portfolio->title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Portfolio Image</label>
                                            <input type="file" id="image" name="image" class="form-control">

                                            @if ($portfolio->image)
                                                <img src="{{ asset($portfolio->image) }}" width="100" class="mt-2">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Client</label>
                                            <input type="text" id="client" name="client" class="form-control"
                                                value="{{ $portfolio->client }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Website</label>
                                            <input type="text" id="website" name="website" class="form-control"
                                                value="{{ $portfolio->website }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Duration</label>
                                            <input type="text" id="duration" name="duration" class="form-control"
                                                value="{{ $portfolio->duration }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="5">{{ $portfolio->description }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Portfolio</button>
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
