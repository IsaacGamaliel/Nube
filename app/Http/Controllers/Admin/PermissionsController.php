<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;


class PermissionsController extends Controller
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
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::extend('without_blanks', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $request->validate([
            'name'=> 'required|without_blanks|unique:permissions',
            'description'=> 'required|alpha'
        ],[
            'name.required'=>'Rquerido',
            'name.unique'=>'Nombre ya usado',
            'name.without_blanks' => 'El campo no debe contener espacios en blanco.',
            'description.required'=>'Rquerido.',
            'description.alpha' => 'El campo no debe contener numeros ni caracteres.',
        ]);

        $permission = Permission::create($request->all());

        return back()->with('info', ['success', 'Se ha creado el permiso']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            $permission = Permission::find($id);
            return view('admin.permissions.edit', compact('permission'));
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
            Validator::extend('without_blanks', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
            });
            $request->validate([
                'name'=> 'required|without_blanks',
                'description'=> 'required|alpha'
            ],[
                'name.required'=>'Rquerido',
                'name.without_blanks' => 'El campo no debe contener espacios en blanco.',
                'description.required'=>'Rquerido.',
                'description.alpha' => 'El campo no debe contener numeros ni caracteres.',
            ]);
            $permission = Permission::find($id);
            $permission->update($request->all());
            return back()->with('info', ['success', 'Se ha actualizado el permisos']);
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
            $permission = Permission::find($id)->delete();
            return back()->with('info', ['warning', 'Se ha eliminado el permiso']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }

    }
}
