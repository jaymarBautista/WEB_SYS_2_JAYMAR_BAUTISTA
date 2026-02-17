<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/evaluation', function (Request $request) {
    return view('evaluation', [
        'name' => $request->query('name'),
        'prelim' => $request->query('prelim'),
        'midterm' => $request->query('midterm'),
        'final' => $request->query('final'),
    ]);
});