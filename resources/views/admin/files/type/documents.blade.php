@extends('admin.layouts.app')

@section('page', 'Documentos')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col">Nombre</th>
						<th scope="col">Subido</th>
						@if(Auth::user()->hasRole("Admin"))
						<th scope="col">Usuario</th>
						@endif
						<th scope="col" width="27%">Ver</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@forelse($documents as $document)
						<tr>
							<th scope="row">
								@if($document->extension == 'pdf' || $document->extension == 'PDF')
									<img class="img-responsive" src="{{ asset('img/files/pdf.svg') }}" width="50">
								@endif
								@if($document->extension == 'xlsx' || $document->extension == 'XLSX')
									<img class="img-responsive" src="{{ asset('img/files/excel.svg') }}" width="50">
								@endif
								@if($document->extension == 'docx' || $document->extension == 'DOCX')
									<img class="img-responsive" src="{{ asset('img/files/word.svg') }}" width="50">
								@endif
							</th>
							<th scope="row">{{ $document->name }}</th>
							<th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
							@if(Auth::user()->hasRole("Admin"))
							<th scope="col">{{ $document->user->name }}</th>
							@endif
							<th scope="row">
								@if($document->extension == 'pdf' || $document->extension == 'PDF')
									<a class="btn btn-primary" style="width: 55%;" target="_blank" href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a>
								@else
									<a class="btn btn-success" style="width: 55%;" target="_blank" href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a>
								@endif
								
							</th>
							<th scope="row">

								<a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal" data-file-id={{ $document->id }}><i class="fas fa-trash"></i> Eliminar</a> 
							
							</th>
						</tr>
					</tbody>
					@empty
						<div class="container mb-5">
					      <div class="alert alert-warning" role="alert">
					         <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
					         <strong>¡Atención!</strong> No tienes ningún documento
					      </div>
					   </div>
					@endforelse
				</table>
			</div>
	</div>
</div>

<!-- Modal -->
	@include('admin.partials.modals.files')

@endsection

@section('scripts')
	@include('admin.partials.js.deleteModal')
@endsection