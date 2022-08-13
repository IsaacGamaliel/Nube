@extends('admin.layouts.app')

@section('page', 'Todos los roles')

@section('content')
@include('admin.partials.alert')
@include('admin.partials.error')
<div class="container">
	<div class="row">

		<div class="col-sm-12 mb-5">
			<a class="btn btn-outline-success" href="{{ route('role.create') }}"><i class="fas fa-plus-circle"></i> Agregar un rol</a>
		</div>

		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Ver</th>
						<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@forelse($roles as $role)

						<tr>
                            @if ( $role->name == 'Admin')

                            @else
                            <th scope="row">{{ $role->id }}</th>
                                <th scope="row">{{ $role->name }}</th>
                                <th scope="row">

                                    <a class="btn btn-outline-success" href="{{ route('role.show',Crypt::encrypt($role->id )) }}"><i class="fas fa-eye"></i> Ver</a>
                                </th>

                                <th scope="row">
                                    <a class="btn btn-outline-primary" href="{{ route('role.edit', Crypt::encrypt($role->id)) }}"><i class="far fa-edit"></i> Editar</a>
                                </th>
                                <th scope="row">
                                    <form action="{{ route('role.destroy', Crypt::encrypt($role->id))}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">

                                        <button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i> Eliminar</button>

                                    </form>

							    </th>
                            @endif
						</tr>
					</tbody>

					@empty
						<div class="container mb-5">
					      <div class="alert alert-warning" role="alert">
					         <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
					         <strong>¡Atención!</strong> No tienes ningún rol
					      </div>
					   </div>
					@endforelse
				</table>
			</div>
	</div>
</div>

@endsection
