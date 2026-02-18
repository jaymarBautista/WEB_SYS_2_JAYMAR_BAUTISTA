<?php

use Illuminate\Support\Facades\Route;

// Problem 1: Student Profile Page
Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student_profile', compact('id', 'name'));
});

// Problem 2: Course Enrollment (Optional Year Level)
Route::get('/course/{course}/{level?}', function ($course, $level = 3) {
    return view('course_enrollment', compact('course', 'level'));
});

// Problem 3: OJT Company (Optional Allowance)
Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = 'Yes') {
    return view('ojt_info', compact('company', 'city', 'allowance'));
});

// Problem 4: Event Registration (All Mandatory)
Route::get('/event/{event}/{participant}/{year}', function ($event, $participant, $year) {
    return view('event_registration', compact('event', 'participant', 'year'));
});