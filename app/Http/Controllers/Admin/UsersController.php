<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:Admin']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $usuario = Auth::user()->username;
   
        return view('admin.users.index', compact('users','usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::extend('alpha_espacio', function($attr, $value){
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('without_blanks', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'name'=> 'required|string|max:50|alpha_espacio|min:4',
            'email'=>'required|string|email|max:50|unique:users|without_blanks',
            'password'=>'required|string|min:6|max:10|without_blanks',
            'username' => 'required|string|max:20|min:5|unique:users|without_blanks'
        ],[
            'name.required'=>'Requerido.',
            'name.min'=>'Minimo 4.',
            'name.max'=>'Maximo 50.',
            'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres.',
            'email.required'=>'Requerido.',
            'email.email'=>'Introducir formato de correo correcto.',
            'email.unique'=>'Correo ya usado.',
            'email.max'=>'Maximo 50.',
            'email.without_blanks' => 'El campo Correo no debe contener espacios en blanco.',
            'password.required'=>'Requerido',
            'password.min'=>'Minimo 6.',
            'password.max'=>'Maximo 10.',
            'password.without_blanks' => 'El campo Contraseña no debe contener espacios en blanco.',
            'username.required'=>'Requerido',
            'username.min'=>'Minimo 5.',
            'username.max'=>'Maximo 20.',
            'username.unique'=>'Username ya existe.',
            'username.without_blanks' => 'El campo Username no debe contener espacios en blanco.',

        ]);


        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        $user->roles()->sync($request->get('roles'));

        return back()->with('info', ['success', 'Se ha creado el usuario']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $id =decrypt($id);
            $user = User::find($id);
            return view('admin.users.show', compact('user'));
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id =decrypt($id);
            $user = User::find($id);
            $roles = Role::get();

            return view('admin.users.edit', compact('roles', 'user'));
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $id =decrypt($id);

        Validator::extend('alpha_espacio', function($attr, $value){
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('without_blanks', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'name'=> 'required|string|max:50|alpha_espacio|min:4',
            'email'=>'required|string|email|max:50|without_blanks',

        ],[
            'name.required'=>'Rquerido.',
            'name.min'=>'Minimo 4.',
            'name.max'=>'Maximo 50.',
            'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres.',
            'email.required'=>'Rquerido.',
            'email.email'=>'Introducir formato de correo correcto.',
            'email.max'=>'Maximo 50.',
            'email.without_blanks' => 'El campo Correo no debe contener espacios en blanco.',

        ]);

            $user = User::find($id);
            //dd($request->get('roles'));
            $user->update($request->except('roles'));
            $user->roles()->sync($request->get('roles'));

            return back()->with('info', ['success', 'Se han actualizado los datos del usuario']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $id =decrypt($id);
            $user = User::find($id)->delete();
            return back()->with('info', ['success', 'Se han eliminado el usuario']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }
}
