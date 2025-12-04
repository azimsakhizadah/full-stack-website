@extends('admin.admin_master')
@section('admin')
    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Add Team members</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    {{-- Show Validation Errors Here --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {{-- End Error Block --}}

                                    <form action="{{ route('add.team') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Name</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Position</label>
                                            <input type="text" id="position" name="position" class="form-control">
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Image</label>
                                            <input type="file" id="image" name="image" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Biography</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="5" spellcheck="false"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Linkedin</label>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Github</label>
                                            <input type="text" id="github" name="github" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Instagram</label>
                                            <input type="text" id="instagram" name="instagram" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add New Member</button>
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
