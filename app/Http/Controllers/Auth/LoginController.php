<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
            $request = app('request');
            Validator::extend('without_blanks', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
            });
            $request->validate([
                'username'=> 'required|without_blanks',
                'password'=>'required|without_blanks',
                
            ],[
                'username.required'=>'Rquerido',
                'password.required'=>'Requerido',
                'password.without_blanks' => 'El campo Contraseña no debe contener espacios en blanco.',
            ]);
           
            $emailOrUsername = request()->input('username');
            $this->username = filter_var($emailOrUsername, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            request()->merge([$this->username => $emailOrUsername]);
            return property_exists($this, 'username') ? $this->username : 'email';

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
