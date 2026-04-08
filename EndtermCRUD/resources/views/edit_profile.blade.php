@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-lg border-0 mb-5">
            <div class="card-header bg-success text-white p-3">
                <h4 class="mb-0 fw-bold">Update Account Settings</h4>
            </div>
            <div class="card-body p-4">
                <form action="/update-student" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $user->email }}">

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">First Name</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" required>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Course</label>
                            <input type="text" name="course" class="form-control" value="{{ $user->course }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Year Level</label>
                            <input type="text" name="year_level" class="form-control" value="{{ $user->year_level }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Home Address</label>
                        <textarea name="address" class="form-control" rows="2" required>{{ $user->address }}</textarea>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Birthdate</label>
                            <input type="date" name="birthdate" class="form-control" value="{{ $user->birthdate }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="border-top pt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-success px-5 fw-bold">Save All Changes</button>
                        <a href="{{ route('profile') }}" class="btn btn-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection