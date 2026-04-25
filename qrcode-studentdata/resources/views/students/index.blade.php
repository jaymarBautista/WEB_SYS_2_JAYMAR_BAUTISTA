@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold"><i class="bi bi-list-stars me-2"></i>Student Records</h3>
    <a href="{{ route('students.create') }}" class="btn btn-dark shadow-sm px-4">Add Student</a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('students.index') }}" method="GET" class="row g-2">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control border-0 bg-light" placeholder="Search by ID, Name, or Course..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter Results</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm overflow-hidden">
    <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="ps-4">Photo</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Course</th>
                <th class="text-center">QR Pass</th>
                <th class="text-end pe-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td class="ps-4">
                    <img src="{{ $student->photo ? asset('storage/'.$student->photo) : 'https://ui-avatars.com/api/?name='.$student->first_name }}" class="student-photo shadow-sm">
                </td>
                <td class="fw-bold">{{ $student->student_id }}</td>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->course }}</td>
                <td class="text-center">{!! $student->qr !!}</td>
                <td class="text-end pe-4">
                    <div class="btn-group">
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this student?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection