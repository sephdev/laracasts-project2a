<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    // CODE EDIT BY Joseph

    // ORIGINAL CODE
    use AuthenticatesUsers;

    // CODE FOR ROUTING LOGOUT
    // use AuthenticatesUsers {
    //     logout as performLogout;
    // }

    // public function logout(Request $request)
    // {
    //     $this->performLogout($request);
    //     return redirect()->route('home');
    // }

    // CODE EDIT END

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
