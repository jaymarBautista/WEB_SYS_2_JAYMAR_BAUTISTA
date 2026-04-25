@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm p-4">
            <h4 class="fw-bold mb-4 text-warning">Edit Student</h4>
            <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Student ID</label>
                        <input type="text" name="student_id" class="form-control" value="{{ $student->student_id }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Year Level</label>
                        <select name="year_level" class="form-select">
                            @foreach(['1st Year','2nd Year','3rd Year','4th Year'] as $year)
                            <option {{ $student->year_level == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Course</label>
                        <input type="text" name="course" class="form-control" value="{{ $student->course }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Gender</label>
                        <select name="gender" class="form-select">
                            <option {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" value="{{ $student->birthdate }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Profile Picture</label>
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        @if($student->photo)
                        <img src="{{ asset('storage/'.$student->photo) }}" class="mt-2 rounded" width="80">
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning px-5 py-2 fw-bold">Update Student</button>
                    <a href="{{ route('students.index') }}" class="btn btn-light ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection