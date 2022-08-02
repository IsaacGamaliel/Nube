@extends('admin.layouts.app')

@section('page', 'Crear un nuevo rol')

@section('content')
@include('admin.partials.alert')
@include('admin.partials.error')
<form class="was-validated" action="{{ route('role.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Nombre del rol</label>
			<input type="text" name="name" class="form-control is-valid" id="RoleName" placeholder="Nombre del rol" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name" value="{{ old('name') }}" maxlength="21"
            minlength="3" required>
			<div class="invalid-feedback">¡Debes agregar un nombre!</div>

            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif

		</div>
		<div class="col-sm-6 mb-3">
			<label class="ml-3">Ten cuidado con los permisos que otorgas</label>
				<div class="form-group">
					<ul>
						<div class="col-auto my-1">
							<div class="custom-control custom-checkbox mr-sm-2">
								@foreach($permissions as $permission)
									<li>
										<input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $permission->id }}" value="{{ $permission->id }}">
										<label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->description }}</label>
									</li>
								@endforeach
							</div>
						</div>
					</ul>
				</div>
		</div>
	</div>

	<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
    <br>
    <br>
    <a class="btn btn-outline-success" href="{{ route('role.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

</form>

@endsection
