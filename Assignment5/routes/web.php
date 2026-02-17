<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/evaluation', function () {
    $name = "Jaymar";
    $prelim = 92;
    $midterm = 88;
    $final = 94;
    return view('evaluation', compact(['name','prelim', 'midterm', 'final']));
});