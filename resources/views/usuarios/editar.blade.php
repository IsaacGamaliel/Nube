@extends('admin.layouts.app')

@section('page', 'Editar datos del usuario')

@section('content')
    @include('admin.partials.alert')

    <form class="was-validated" action="{{ route('usuario.update', Crypt::encrypt($user->id)) }}" enctype="multipart/form-data"
        method="POST">
        @csrf
        @method('PATCH')

        <div class="form-row">
            <div class="col-sm-6 mb-3">
                <label for="UserName">Nombre del usuario</label>
                <input type="text" name="name" class="form-control is-valid" id="UserName" value="{{ $user->name }}"
                    required maxlength="50" minlength="10">
                <div class="invalid-feedback">¡No puedes dejar el usuario sin nombre!</div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-6 mb-3">
                <label for="UserEmail">Email del usuario</label>
                <input type="text" name="email" class="form-control is-valid" id="UserEmail"
                    value="{{ $user->email }}" required maxlength="50" minlength="5">
                <div class="invalid-feedback">¡No puedes dejar el usuario sin email!</div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-6 mb-3">
                <label for="UserEmail">Username</label>

                <input id="username" type="text" class="form-control is-valid" name="username"
                    value="{{ $user->username }}" maxlength="20" minlength="5" required>

                @if ($errors->has('username'))
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>






        </div>

        <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
        <br>
        <br>
        <a class="btn btn-outline-success" href="{{ route('profile') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>


    </form>

@endsection
