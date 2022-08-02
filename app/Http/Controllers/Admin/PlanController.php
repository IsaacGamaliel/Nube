<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PlanController extends Controller
{
   public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.create');
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
        Validator::extend('numbers_only', function($attr, $value){
            return preg_match('/^[0-9]*$/u', $value);
          });
        $request->validate([
            'plan_name'=> 'required|string|max:20|alpha_espacio|min:5|unique:plans|without_blanks',
            'plan_description'=>'required|string|max:200|min:10',
            'plan_price'=>'required|string|min:2|max:4|without_blanks|numbers_only',
            'plan_type' => 'required|string|max:20|min:3|without_blanks',
            'name'=>'required|string|max:15|min:4|without_blanks',
            'description'=>'required|string|min:3|max:20',
            'btn_label'=>'required|string|min:3|max:15',
            'amount'=>'required|string|min:2|max:6|without_blanks|numbers_only'
        ],[
            'plan_name.required'=>'Requerido.',
            'plan_name.min'=>'Minimo 5.',
            'plan_name.max'=>'Maximo 20.',
            'plan_name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres.',
            'plan_name.unique'=>'Ya existe el plan',
            'plan_name.without_blanks'=>'El campo Plan nombre no debe contener espacios en blanco.',

            'plan_description.required'=>'Requerido',
            'plan_description.max'=>'Maximo 200.',
            'plan_description.min' => 'Minimo 10',

            'plan_price.required'=>'Requerido',
            'plan_price.min'=>'Minimo 2.',
            'plan_price.max'=>'Maximo 4.',
            'plan_price.without_blanks' => 'El campo precio no debe contener espacios en blanco.',
            'plan_price.numbers_only'=>'Solo se aceptan numeros.',

            'plan_type.min'=>'Minimo 3.',
            'plan_type.max'=>'Maximo 20.',
            'plan_type.required'=>'Requerido.',
            'plan_type.without_blanks' => 'El campo Tipo de plan no debe contener espacios en blanco.',

            'name.required'=>'Requerido',
            'name.min'=>'Minimo 4.',
            'name.max'=>'Maximo 15.',
            'name.without_blanks' => 'El campo Nombre del modal no debe contener espacios en blanco.',

            'description.required'=>'Requerido',
            'description.max'=>'Maximo 20.',
            'description.min' => 'Minimo 3',

            'description.required'=>'Requerido',
            'description.max'=>'Maximo 20.',
            'description.min' => 'Minimo 3',

            'btn_label.required'=>'Requerido',
            'btn_label.max'=>'Maximo 15.',
            'btn_label.min' => 'Minimo 3',

            'amount.required'=>'Requerido',
            'amount.min'=>'Minimo 2.',
            'amount.max'=>'Maximo 6.',
            'amount.without_blanks' => 'El campo monto a cobrar no debe contener espacios en blanco.',
            'amount.numbers_only'=>'Solo se aceptan numeros.',

        ]);

        $plan = Plan::create($request->all());
      return back()->with('info', ['success', 'El plan se ha creado correctamente']);
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
            $plan = Plan::find($id);
            return view('admin.plans.show', compact('plan'));
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
        $plan = Plan::find($id);
      return view('admin.plans.edit', compact('plan'));
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
            Validator::extend('numbers_only', function($attr, $value){
                return preg_match('/^[0-9]*$/u', $value);
              });
            $request->validate([
                'plan_name'=> 'required|string|max:20|alpha_espacio|min:5|without_blanks',
                'plan_description'=>'required|string|max:200|min:10',
                'plan_price'=>'required|string|min:2|max:4|without_blanks|numbers_only',
                'plan_type' => 'required|string|max:20|min:3|without_blanks',
                'name'=>'required|string|max:15|min:4|without_blanks',
                'description'=>'required|string|min:3|max:20',
                'btn_label'=>'required|string|min:3|max:15',
                'amount'=>'required|string|min:2|max:6|without_blanks|numbers_only'
            ],[
                'plan_name.required'=>'Requerido.',
                'plan_name.min'=>'Minimo 5.',
                'plan_name.max'=>'Maximo 20.',
                'plan_name.alpha_espacio'=>'El campo Nombre no debe tener numeros y caracteres.',
                'plan_name.without_blanks'=>'El campo Plan nombre no debe contener espacios en blanco.',

                'plan_description.required'=>'Requerido',
                'plan_description.max'=>'Maximo 200.',
                'plan_description.min' => 'Minimo 10',

                'plan_price.required'=>'Requerido',
                'plan_price.min'=>'Minimo 2.',
                'plan_price.max'=>'Maximo 4.',
                'plan_price.without_blanks' => 'El campo precio no debe contener espacios en blanco.',
                'plan_price.numbers_only'=>'Solo se aceptan numeros.',

                'plan_type.min'=>'Minimo 3.',
                'plan_type.max'=>'Maximo 20.',
                'plan_type.required'=>'Requerido.',
                'plan_type.without_blanks' => 'El campo Tipo de plan no debe contener espacios en blanco.',

                'name.required'=>'Requerido',
                'name.min'=>'Minimo 4.',
                'name.max'=>'Maximo 15.',
                'name.without_blanks' => 'El campo Nombre del modal no debe contener espacios en blanco.',

                'description.required'=>'Requerido',
                'description.max'=>'Maximo 20.',
                'description.min' => 'Minimo 3',

                'description.required'=>'Requerido',
                'description.max'=>'Maximo 20.',
                'description.min' => 'Minimo 3',

                'btn_label.required'=>'Requerido',
                'btn_label.max'=>'Maximo 15.',
                'btn_label.min' => 'Minimo 3',

                'amount.required'=>'Requerido',
                'amount.min'=>'Minimo 2.',
                'amount.max'=>'Maximo 6.',
                'amount.without_blanks' => 'El campo monto a cobrar no debe contener espacios en blanco.',
                'amount.numbers_only'=>'Solo se aceptan numeros.',

            ]);


            $plan = Plan::find($id);
            $plan->update($request->all());

            return back()->with('info', ['success', 'El plan ha sido actualizado correctamente']);
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
            $plan = Plan::find($id)->delete();
            return back()->with('info', ['success', 'El plan ha sido eliminado correctamente']);
        } catch (DecryptException $e) {
            return view('errors.404');
        }
   }
}
