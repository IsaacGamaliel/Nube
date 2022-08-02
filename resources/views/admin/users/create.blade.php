@extends('admin.layouts.app')

@section('page', 'Crear un nuevo rol')

@section('content')
@include('admin.partials.alert')

<form class="was-validated" action="{{ route('user.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="UserName">Nombre</label>
			<input type="text" name="name" class="form-control is-valid" id="UserName" placeholder="Nombre del usuario" required>
			<div class="invalid-feedback">¡Debes agregar un nombre!</div>
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
		</div>

        <div class="col-sm-6 mb-3">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control is-valid" id="username" placeholder="nubeusuario" minlength="5" maxlength="20" required>
			<div class="invalid-feedback">¡Debes agregar un username!</div>
            @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
		</div>


		<div class="col-sm-6 mb-3">
			<label for="UserEmail">Correo electrónico</label>
			<input type="email" name="email"  id="UserEmail" placeholder="nube@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
            name="email" value="{{ old('email') }}" maxlength="50" minlength="5"
            required>
			<div class="invalid-feedback">¡Debes agregar un correo electrónico!</div>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserPassword">Contraseña</label>
			<input type="password" name="password"  id="UserPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
            name="password" required maxlength="10" minlength="6">
			<div class="invalid-feedback">¡Debes agregar un Una contraseña!</div>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
		</div>

		<div class="col-sm-6 mb-3">
			<label for="UserImage">Imagen (por defecto)</label>
			<input type="image" name="image" class="form-control" id="UserImage" value="user.svg" disabled>
		</div>
		<div class="col-sm-6 mb-3">
			<label class="ml-3">Ten cuidado con los permisos que otorgas</label>
				<div class="form-group">
					<ul>
						<div class="col-auto my-1">
							<div class="custom-control custom-checkbox mr-sm-2">
								@foreach($roles as $role)
									<li>
										<input type="checkbox" name="roles[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id }}">
										<label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
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
    <a class="btn btn-outline-success" href="{{ route('user.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

</form>

@endsection
