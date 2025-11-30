@extends('admin.admin_master')
@section('admin')
    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Get Slider</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('update.slider', $slider->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label"> Title</label>
                                            <input type="text" id="title" name="title" class="form-control"
                                                value="{{ $slider->title }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Link</label>
                                            <input type="text" id="link" name="link" class="form-control"
                                                value="{{ $slider->link }}">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Slider Image</label>
                                            <input type="file" id="image" name="image" class="form-control">

                                            @if ($slider->image)
                                                <img src="{{ asset($slider->image) }}" width="80" class="mt-2">
                                            @endif
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="5">{{ $slider->description }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Slider</button>
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
