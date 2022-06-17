<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




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
    protected $redirectTo = '/home';

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
            Validator::extend('without_blanks', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
            });
            //dd($data);
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:50','alpha'],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users','without_blanks'],
                'username' => ['required', 'string', 'max:20','min:5' ,'unique:users','without_blanks'],
                'password' => ['required', 'string', 'min:6','max:10', 'confirmed','without_blanks'],
                'image' => ['required','mimes:jpeg,jpg,png' ], 
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
        try {

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
        } catch (\Throwable $th) {
            throw $th;
        }

        
    }
}
