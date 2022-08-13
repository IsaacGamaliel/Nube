@extends('admin.layouts.app')

@section('page', 'Detalles del usuario')

@section('content')
@include('admin.partials.alert')
@include('admin.partials.error')
	<div class="row mb-3">
		<div class="col-sm-12">
			<div class="mt-5 pb-5">
                @if ($user->image == "user.svg")
                <img src="{{ asset('img') }}/{{ $user->image }}" width="120" class="img-responsive rounded-circle d-block mx-auto">
                @else
				<img src="{{ asset('Archivos') }}/{{ $user->image }}" width="140" class="img-responsive rounded-circle d-block mx-auto">
                @endif
				<h4 class="text-center mt-3 mb-1">{{ $user->name }}</h4>
				<p class="text-center">{{ $user->email }}</p>

				<div class="d-flex row-flex justify-content-center">
					<a class="btn btn-outline-success" href="{{ route('user.edit', Crypt::encrypt($user->id)) }}"><i class="fas fa-edit"></i> Editar perfil</a>
				</div>
			</div>
		</div>
	</div>

	<a class="btn btn-outline-success" href="{{ route('user.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

@endsection
