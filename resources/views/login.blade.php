@extends('layout.master')

@section('content')

<section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4 text-primary">Login Page</h1>

                {{-- Global Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your name">

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="Enter your email">

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password">

                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
