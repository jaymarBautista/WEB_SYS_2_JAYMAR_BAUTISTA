@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 text-center">
        <div class="card p-5 shadow-lg border-0">
            <img src="{{ $student->photo ? asset('storage/' . $student->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($student->first_name) }}"
                class="student-photo shadow-sm" style="width:120px; height:120px; object-fit:cover; border-radius:50%;">
            <h3 class="fw-bold">{{ $student->full_name }}</h3>
            <span class="badge bg-primary mb-4">{{ $student->course }} | {{ $student->year_level }}</span>

            <div class="bg-white p-3 d-inline-block rounded shadow-sm border mb-4">
                {!! $qr !!}
                <div class="mt-2 small fw-bold text-muted">{{ $student->student_id }}</div>
            </div>

            <div class="text-start bg-light p-3 rounded mb-4 small">
                <div><strong>Email:</strong> {{ $student->email }}</div>
                <div><strong>Phone:</strong> {{ $student->phone }}</div>
                <div><strong>Birthdate:</strong> {{ $student->birthdate }}</div>
                <div><strong>Gender:</strong> {{ $student->gender }}</div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                <button onclick="window.print()" class="btn btn-primary px-4"><i class="bi bi-printer me-2"></i>Print Card</button>
            </div>
        </div>
    </div>
</div>
@endsection