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
            $validator = Validator::make($request->all(),[
                'username' => ['required', 'string', 'max:50','without_blanks','unique:users'],
                'password' => ['required', 'string', 'min:6','max:10','without_blanks'],
            ],[
                'username.unique'=>'No existe el usuario o correo',
                'password.min'=>'Minimo 6',
                'password.max'=>'maximo 10',
                'password.without_blanks'=>'No se permiten espacios en blanco'
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
