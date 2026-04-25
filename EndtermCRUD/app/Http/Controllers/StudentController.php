<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    // Simple helper to save logs
    private function saveLog($email, $action)
    {
        DB::table('logs')->insert(['user_email' => $email, 'action' => $action]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6|confirmed',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'student_id' => 'required',
        ]);
        
        DB::table('user')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'address' => $request->address,
            'course' => $request->course,
            'year_level' => $request->year_level,
            'student_id' => $request->student_id,

        ]);
        $this->saveLog($request->email, 'REGISTERED');
        return redirect('/login')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $user = DB::table('user')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user in session
            session(['user_email' => $user->email, 'user_id' => $user->id]);

            $this->saveLog($user->email, 'LOGIN');
            return redirect()->route('profile');
        }
        return back()->with('error', 'Invalid Credentials');
    }

    public function update(Request $request)
    {
        DB::table('user')->where('email', $request->email)->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'address'    => $request->address,
            'course'     => $request->course,
            'year_level' => $request->year_level,
            'birthdate'  => $request->birthdate,
            'gender'     => $request->gender,
            'updated_at' => now(),
        ]);

        // Mandatory Logging
        $this->saveLog($request->email, 'UPDATED_FULL_PROFILE');

        return redirect()->route('profile')->with('success', 'Information updated successfully!');
    }
    public function editProfile()
    {
        $email = session('user_email');
        if (!$email) return redirect('/login');

        $user = DB::table('user')->where('email', $email)->first();
        return view('edit_profile', ['user' => $user]);
    }
    public function showProfile()
    {
        $email = session('user_email');
        if (!$email) return redirect('/login');

        $user = DB::table('user')->where('email', $email)->first();
        return view('profile', ['user' => $user]);
    }
    public function logout(Request $request)
    {
        $this->saveLog(session('user_email'), 'LOGOUT');
        session()->forget(['user_email', 'user_id']);
        return redirect('/login');
    }
}
