<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function __construct()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $this->redirectTo = route('admin.dashboard.index');
        } elseif (Auth::check() && Auth::user()->role == 'teacher') {
            $this->redirectTo = route('teacher.dashboard.index');
        } elseif (Auth::check() && Auth::user()->role == 'student') {
            $this->redirectTo = route('student.dashboard.index');
        }

        $this->middleware('guest')->except('logout');
    }


    // After login where to go
    public function redirectAuth()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $redirectTo = route('admin.dashboard.index');
        } elseif (Auth::check() && Auth::user()->role == 'teacher') {
            $redirectTo = route('teacher.dashboard.index');
        } elseif (Auth::check() && Auth::user()->role == 'student') {
            $redirectTo = route('student.dashboard.index');
        }

        $this->middleware('guest')->except('logout');
        return $redirectTo;
    }
}
