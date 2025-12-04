<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = strtolower(trim($request->email));
        $password = trim($request->password);
        $user = User::where('email', $email)->first();
        if ($user) {
            if ($password == $user->password) {
                Session::put('user_id', $user->id);
                return redirect('/movies');
            } else {
                return back()->with('error', 'Invalid password');
            }
        } else {
            return back()->with('error', 'User not found');
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => strtolower(trim($request->email)),
            'password' => trim($request->password),
        ]);

        Session::put('user_id', $user->id);

        return redirect('/movies')->with('success', 'Registered and logged in!');
    }

    public function logout()
    {
        Session::forget('user_id');
        return redirect('/');
    }
}
