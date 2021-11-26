<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // // dd(Hash::check($value, $hashedValue))
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username', $username)->first();
        if (!$user) {
            $validator = $request->validate([
                'username' => ['required'],
            ]);
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }
        if (!Hash::check($password, $user->password)) {
            $validator = $request->validate([
                'password' => ['required'],
            ]);
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/');
        }
        return redirect('login');
    }
    public function login_form()
    {
        if (auth()->user() == null) {
            return view('auth.login');
        }
        if (auth()->user()->level == 'admin') {
            return redirect('dashboard');
        } elseif (auth()->user()->level == 'biasa') {
            return redirect('home');
        }
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
