<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function show(){
        $status = "";
        $age = 78;
        if($age >= 18){
           $status = "You are an Adult";
        } else {
            $status = "You are a minor";
        }
        return view('welcome', compact($status));
    }
}
