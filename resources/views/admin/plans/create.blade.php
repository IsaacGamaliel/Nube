@extends('admin.layouts.app')

@section('page', 'Crear un nuevo plan de suscripción')

@section('content')
@include('admin.partials.alert')

<form class="was-validated" action="{{ route('plan.store') }}" method="POST">
	@csrf

	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="PlanName">Nombre del plan</label>
			<input type="text" name="plan_name" class="form-control is-valid" id="PlanName" placeholder="Mensual" required minlength="5" maxlength="20">
			<div class="invalid-feedback">¡Debes agregar un nombre al plan!</div>
            @if ($errors->has('plan_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('plan_name') }}</strong>
            </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="details">Detalles del plan</label>
			<textarea name="plan_description" class="form-control is-valid" id="details" rows="3" required minlength="10" maxlength="200">
			</textarea>
            @if ($errors->has('plan_description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('plan_description') }}</strong>
            </span>
            @endif
			<div class="invalid-feedback">¡Debes agregar los detalles del plan!</div>
		</div>

		<div class="col-sm-12 mb-3">
			<div class="alert alert-warning">
				El siguiente código es un ejemplo para los detalles del plan.
			</div>
		</div>

		<div class="col-sm-12 mb-3">
			<div class="container">
				<code>&ltli&gt&lti class="fas fa-headset"&gt&lti&gt20 GB de almacenamiento&lt/li&gt</code>
			</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanPrice">Precio del plan</label>
			<input type="text" name="plan_price" class="form-control is-valid" id="PlanPrice" placeholder="19" required minlength="2" maxlength="4">
			<div class="invalid-feedback">¡Debes agregar un precio al plan!</div>
            @if ($errors->has('plan_price'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('plan_price') }}</strong>
            </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="PlanType">Tipo de plan</label>
			<input type="text" name="plan_type" class="form-control is-valid" id="PlanType" placeholder="BSMonthly" minlength="3" maxlength="20" required>
			<div class="invalid-feedback">¡Debes agregar un tipo de plan!</div>
            @if ($errors->has('plan_type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('plan_type') }}</strong>
            </span>
            @endif
		</div>

		<hr>

		<div class="col-sm-6 mb-3">
			<label for="ModalName">Nombre del modal</label>
			<input type="text" name="name" class="form-control is-valid" id="ModalName" placeholder="¡Nube" minlength="3" maxlength="15" required>
			<div class="invalid-feedback">¡Debes agregar un nombre al modal!</div>
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="ModalDescription">Descripción del plan</label>
			<input type="text" name="description" class="form-control is-valid" id="ModalDescription" placeholder="Plan mensual" minlength="3" maxlength="20" required>
			<div class="invalid-feedback">¡Debes agregar una descripción al plan!</div>
            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
        </div>

		<div class="col-sm-6 mb-3">
			<label for="btnText">Texto del botón</label>
			<input type="text" name="btn_label" class="form-control is-valid" id="btnText" placeholder="Suscribirse" minlength="3" maxlength="15" required>
			<div class="invalid-feedback">¡Debes agregar un texto al botón!</div>
            @if ($errors->has('btn_label'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('btn_label') }}</strong>
            </span>
            @endif
        </div>

		<div class="col-sm-6 mb-3">
			<label for="btnAmount">Monto a cobrar</label>
			<input type="text" name="amount" class="form-control is-valid" id="btnAmount" placeholder="9900" minlength="2" maxlength="6" required>
			<div class="invalid-feedback">¡Debes agregar un monto!</div>
            @if ($errors->has('amount'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('amount') }}</strong>
            </span>
            @endif
        </div>
	</div>

	<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>

    <br>
    <br>
    <a class="btn btn-outline-success" href="{{ route('plan.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

</form>

@endsection
