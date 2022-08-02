@extends('admin.layouts.app')

@section('page', 'Editar permiso')

@section('content')
@include('admin.partials.alert')

<form class="was-validated" action="{{ route('permission.update',Crypt::encrypt($permission->id)) }}" method="POST">
	@csrf
	@method('PATCH')

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Nombre del permiso (Ej: role.create)</label>
			<input type="text" name="name" class="form-control is-valid" id="RoleName" value="{{ $permission->name }}" minlength="3" maxlength="20" required>
			<div class="invalid-feedback">¡El nombre no puede estar en blanco!</div>

            @if ($errors->has('name'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="RoleName">Descripción del permiso</label>
			<input type="text" name="description" class="form-control is-valid" id="RoleName" value="{{ $permission->description }}" minlength="3" maxlength="30" required>
			<div class="invalid-feedback">¡La descripción no puede estar en blanco!</div>
            @if ($errors->has('description'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @endif
		</div>

	</div>

	<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
    <br>
    <br>
    <a class="btn btn-outline-success" href="{{ route('permission.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

</form>

@endsection
