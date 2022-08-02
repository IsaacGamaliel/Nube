<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class RolesController extends Controller
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
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
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

        $validator = Validator::make($request->all(),[
            'name'=> 'required|without_blanks|unique:roles|alpha_espacio|min:3|max:10',
        ],[
            'name.required'=>'Rquerido',
            'name.unique'=>'Nombre ya usado',
            'name.without_blanks' => 'El campo no debe contener espacios en blanco.',
            'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres'
        ]);


        if ($validator->fails()) {

            return back()->with('info', ['danger', '¡Error! Verifica los campo Nombre, campo vacio, contiene numero o ya esta en uso el nombre']);
        }else{

            $role = Role::create($request->except('permissions'));
            $role->permissions()->sync($request->get('permissions'));
            return back()->with('info', ['success', 'Se ha creado el rol']);
        }
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
        $id =decrypt($id); //desencriptar tu variable
        $role = Role::find($id);
        $permissions = $role->permissions()->get();
        return view('admin.roles.show', compact('role', 'permissions'));
      }catch (DecryptException $e) {
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
            $id =decrypt($id); //desencriptar tu variable
            $role = Role::find($id);
            $permissions = Permission::get();
            return view('admin.roles.edit', compact('role', 'permissions'));
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

            $validator = Validator::make($request->all(),[
                'name'=> 'required|without_blanks|alpha_espacio|min:3|max:10',
            ],[
                'name.required'=>'Rquerido',
                'name.without_blanks' => 'El campo no debe contener espacios en blanco.',
                'name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres'
            ]);

            if ($validator->fails()) {
                return back()->with('info', ['danger', '¡Error! Verifica los campo Nombre, campo vacio, contiene numero o ya esta en uso el nombre']);
            }else{
                $role = Role::find($id);
                $role->update($request->except('permissions'));
                $role->permissions()->sync($request->get('permissions'));
                return back()->with('info', ['success', 'Se ha actualizado el rol']);

            }

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
            $role = Role::find($id)->delete();
            return back()->with('info', ['warning', 'Se ha eliminado el rol']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }
}
