@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Profile</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/bastan.png') }}"
                                class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile" id="showImage">

                            <div class="overflow-hidden ms-4">
                                <h4 class="m-0 text-dark fs-20">{{ $profileData->name }}</h4>
                                <p class="my-1 text-muted fs-16">{{ $profileData->email }}</p>
                            </div>
                        </div>

                        <!-- Single Form for Profile + Password -->
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <!-- Left Column: Personal Info -->
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card border mb-3">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Personal Information</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $profileData->name) }}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $profileData->email) }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone', $profileData->phone) }}">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{ old('address', $profileData->address) }}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" name="photo" id="image" class="form-control @error('photo') is-invalid @enderror">
                                                @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column: Change Password -->
                                <div class="col-lg-6 col-xl-6">
                                    <div class="card border mb-3">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Change Password</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror"
                                                    placeholder="Old Password">
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">New Password</label>
                                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                                                    placeholder="New Password">
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="new_password_confirmation" class="form-control"
                                                    placeholder="Confirm Password">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS: Preview Image -->
<script type="text/javascript">
$(document).ready(function() {
    $('#image').change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});
</script>
@endsection
