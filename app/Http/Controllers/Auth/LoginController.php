<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    //Creacion de funcion para iniciar sesion con usuario/contraseña
    public function username()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
        $emailOrUsername = request()->input('username');
        $this->username = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$this->username => $emailOrUsername]);

        return property_exists($this, 'username') ? $this->username : 'email';
    }

}
