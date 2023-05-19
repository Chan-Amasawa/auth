<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Psy\Command\WhereamiCommand;
use stdClass;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email|unique:students,email",
            "password" => "required|min:8",
            "password_confirmation" => "required|same:password"
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();

        return redirect()->route('auth.login')->with('message', 'register successful');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function check(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:students,email",
            "password" => "required|min:8"
        ], [
            "email.exists" => "Email or Password is wrong"
        ]);

        $student = Student::where('email', $request->email)->first();
        if (!Hash::check($request->password, $student->password)) {
            return redirect()->route('auth.login')->withErrors(['email' => 'Email or Password is wrong']);
        };
        session(["auth" => $student]);
        return redirect()->route('dashboard.index');
    }
    public function logout()
    {
        session()->forget('auth');
        return redirect()->route('auth.login');
    }
}
