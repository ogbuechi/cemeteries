<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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



    public function authenticated()
    {
        if(auth()->user()->hasRole(['admin','superadmin']))
        {
            return redirect('/admin/dashboard');
        }
    }

    protected function redirectTo()
    {
        if (auth()->user()->hasRole(['admin','superadmin'])) {
            return '/admin/dashboard';
        }
        return '/dashboard';
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
