<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFiles = File::pluck('id');
        $recentFiles = File::where('created_at', '>', Carbon::today()->subWeek())->pluck('id');

        $allUsers = User::pluck('id');
        $recentUsers = User::where('created_at', '>', Carbon::today()->subWeek())->pluck('id');

        return view('admin.index', compact('allFiles', 'recentFiles', 'allUsers', 'recentUsers'));
    }

    public function edit($id)
    {
        try {
            $id =decrypt($id);
            $user = User::find($id);
            $roles = Role::get();
            return view('usuarios.editar', compact('roles', 'user'));
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }

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
                'username'=>'required|string|max:20|min:5|unique:users|without_blanks',

            ],[
                'name.required'=>'Rquerido.',
                'name.min'=>'Minimo 4.',
                'name.max'=>'Maximo 50.',
                'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres.',
                'email.required'=>'Rquerido.',
                'email.email'=>'Introducir formato de correo correcto.',
                'email.max'=>'Maximo 50.',
                'email.without_blanks' => 'El campo Correo no debe contener espacios en blanco.',

                'username.required'=>'Rquerido.',
                'username.without_blanks' => 'El campo Usuario no debe contener espacios en blanco.',
                'username.min'=>'Minimo 5.',
                'username.max'=>'Maximo 20.',
                'username.unique'=>'Usuario ya existe'
            ]);

            $user = User::find($id);
            $user->update($request->except('roles'));
            $roles = Role::find(2);
            $user->roles()->sync($roles);
            return back()->with('info', ['success', 'Se han actualizado los datos del usuario']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }

}
