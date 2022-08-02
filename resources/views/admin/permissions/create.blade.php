@extends('admin.layouts.app')

@section('page', 'Crear un nuevo permiso')

@section('content')
@include('admin.partials.alert')

<form class="was-validated" action="{{ route('permission.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Nombre del permiso (Ej: role.create)</label>
			<input type="text" name="name" class="form-control is-valid" id="RoleName" placeholder="role.create" required minlength="3" maxlength="20">
			<div class="invalid-feedback">¡Debes agregar un nombre!</div>

            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
		</div>


		<div class="col-sm-6 mb-3">
			<label for="RoleName">Descripción del permiso</label>
			<input type="text" name="description" class="form-control is-valid" id="RoleName" placeholder="Descripción del permiso" required minlength="3" maxlength="30">
			<div class="invalid-feedback">¡Debes agregar una descripción!</div>
            @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
		</div>


	</div>

	<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
    <br>
    <br>
    <a class="btn btn-outline-success" href="{{ route('permission.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

</form>

@endsection
