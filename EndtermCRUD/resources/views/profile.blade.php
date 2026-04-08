@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white p-3">
                <h4 class="mb-0 fw-bold">Student Profile Dashboard</h4>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="row mb-4">
                    <div class="col-md-6">
                        <small class="text-muted d-block text-uppercase">Full Name</small>
                        <span class="fs-5 fw-semibold">{{ $user->first_name }} {{ $user->last_name }}</span>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small class="text-muted d-block text-uppercase">Student ID</small>
                        <span class="fs-5 fw-bold text-primary">{{ $user->student_id }}</span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="p-3 bg-light rounded shadow-sm">
                            <small class="text-muted text-uppercase">Academic Info</small>
                            <div class="mt-2"><strong>Course:</strong> {{ $user->course }}</div>
                            <div><strong>Year Level:</strong> {{ $user->year_level }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded shadow-sm">
                            <small class="text-muted text-uppercase">Personal Details</small>
                            <div class="mt-2"><strong>Email:</strong> {{ $user->email }}</div>
                            <div><strong>Gender:</strong> {{ $user->gender }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 p-3 border rounded">
                    <small class="text-muted text-uppercase">Other Information</small>
                    <div class="mt-2"><strong>Birthdate:</strong> {{ $user->birthdate }}</div>
                    <div class="mt-2"><strong>Address:</strong> {{ $user->address }}</div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning px-4 fw-bold">Edit Profile Details</a>

                    <form action="/logout-student" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-4">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection