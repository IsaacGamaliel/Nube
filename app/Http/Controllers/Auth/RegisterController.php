<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        try {

            Validator::extend('alpha_espacio', function($attr, $value){
                return preg_match('/^[\pL\s]+$/u', $value);
            });

            Validator::extend('without_blanks', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
            });

            //dd($data);
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:50','alpha_espacio'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users','without_blanks'],
                'username' => ['required', 'string', 'max:20','min:5' ,'unique:users','without_blanks'],
                'password' => ['required', 'string', 'min:6','max:10', 'confirmed','without_blanks'],
                'image' => ['required','mimes:jpeg,jpg,png' ],
            ],[
               'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres',
               'email.unique'=>'Correo ya existe',
               'email.without_blanks' => 'El campo Correo no debe contener espacios en blanco.',
               'username.unique'=>'Usuario ya existe',
               'username.without_blanks' => 'El campo Usuario no debe contener espacios en blanco.',
               'password.without_blanks' => 'El campo Contraseña no debe contener espacios en blanco.',
               'image.mimes'=> 'Solo se aceptan formatos jpeg,jpg,png.',
               'password.min'=>'Minimo 6.',
               'password.max'=>'maximo 10.',
               'password.without_blanks'=>'No se permiten espacios en blanco.',
               'name.required'=>'No se permite enviar espacios en blanco',
               'email.required'=>'No se permite enviar espacios en blanco',
               'username.required'=>'No se permite enviar espacios en blanco',
               'password.required'=>'No se permite enviar espacios en blanco',
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = app('request');
        if ($request->hasFile('image')) {
            $archivo=$request->file('image');
            $archivo->move(public_path().'/Archivos/',$archivo->getClientOriginalName());
            $nombre=$archivo->getClientOriginalName();


        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image'=>$nombre,
            'username' => str_slug($data['username']),
            'password' => Hash::make($data['password']),
        ]);

    }


}

