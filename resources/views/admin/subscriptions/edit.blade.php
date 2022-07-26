@extends('admin.layouts.app')

@section('page', 'Editar datos del usuario')

@section('content')

<form class="was-validated" action="{{ route('plan.update', $plan->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-row">
		
		<div class="col-sm-6 mb-3">
			<label for="PlanName">Nombre del plan</label>
			<input type="text" name="plan_name" class="form-control is-valid" id="PlanName" 
			value="{{$plan->plan_name}}" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al plan</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanName">Detalles del plan</label>
			<textarea name="plan_description" class="form-control is-valid" id="PlanName" 
			rows="7" placeholder="{{$plan->plan_description}}" required></textarea>
			<div class="invalid-feedback">¡Debes agregar detalles al plan</div>
		</div> 
        <div class="col-sm-12 mb-3">
            <div class="alert alert-warning">
                Copear el código de abajo para no dejar los detalles en blanco.
            </div>
        </div>
        <div class="col-sm-12 mb-3">
            <div class="container">
                <code>{{$plan->plan_description}}</code>
            </div>
        </div>

		

		<div class="col-sm-6 mb-3">
			<label for="PlanPrice">Precio del plan</label>
			<input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" value="{{$plan->plan_price}}" required>
			<div class="invalid-feedback">¡Debes agregar tipo al plan</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanType">Tipo del plan</label>
			<input type="text" name="plan_type" class="form-control is-valid" id="PlanType" value="{{$plan->plan_type}}" required>
			<div class="invalid-feedback">¡Debes agregar un precio al plan</div>
		</div>

		<hr>

		<div class="col-sm-6 mb-3">
			<label for="ModalName">Nombre del modal</label>
			<input type="text" name="name" class="form-control is-valid" id="ModalName" value="{{$plan->name}}" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al modal!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="ModalDescription">Descripción del plan</label>
			<input type="text" name="description" class="form-control is-valid" id="ModalDescription" value="{{$plan->description}}" required>
			<div class="invalid-feedback">¡Debes agregar una descripción al plan!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="bntText">Texto del botón</label>
			<input type="text" name="btn_label" class="form-control is-valid" id="bntText" value="{{$plan->btn_label}}" required>
			<div class="invalid-feedback">¡Debes agregar un texto al botón!</div>
		</div>
		
		<div class="col-sm-6 mb-3">
			<label for="btnAmount">Monto a cobrar</label>
			<input type="text" name="amount" class="form-control is-valid" id="btnAmount" value="{{$plan->amount}}" required>
			<div class="invalid-feedback">¡Debes agregar un monto!</div>
		</div>

	</div>

    <button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>

</form>

@endsection