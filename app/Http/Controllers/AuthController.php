<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a form of the login page.
     */
    public function showLoginForm()
    {
        $title = "Login";
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('status', 'Login success');
        }

        return back()->withErrors('error', `Credential doesn't match`);
    }

    /**
     * Show the form for creating a new user.
     */
    public function showRegisterForm()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        // dd($request->all());
        // Start database transaction
        DB::beginTransaction();

        try {
            // Validate registration input
            $validate = $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|unique:users|max:255',
                'password'  => 'required|string|confirmed|min:8',
                'picture'   => 'string|max:255',
            ]);

            // Create user
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'picture'   => $request->picture,
                'role_id'   => 2    // Assign default role as user
            ]);

            // Commit the transaction
            DB::commit();

            // Redirect to login page after successfull registration
            return redirect('/login')->with('status', 'Registration successfull!');
        } catch (Exception $e) {
            // Rollback transaction if error occure
            DB::rollBack();

            // Log error message
            Log::error('Registration error: ' . $e->getMessage());

            // Return back with error message
            return back()->withErrors(['error' => 'There was a problem with your registration. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
