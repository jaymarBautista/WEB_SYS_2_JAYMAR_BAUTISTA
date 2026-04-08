@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-lg p-4 mt-5">
            <h3 class="text-center fw-bold mb-4">Welcome Back</h3>

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="/login-student" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg shadow-sm">Login to Portal</button>
            </form>
            <div class="text-center mt-3">
                <p>New student? <a href="/register" class="text-decoration-none">Create an account</a></p>
            </div>
        </div>
    </div>
</div>
@endsection