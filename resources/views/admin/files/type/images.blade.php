@extends('admin.layouts.app')

@section('page', 'Imágenes')

@section('content')
<div class="container">
    <div class="row">
        @forelse($images as $image)

        <div class="col-sm-6 col-md-4 mt-4">

            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}"
                    alt="{{ $image->name }}">
                <div class="card-body">
                    <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}"
                        target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i> Ver </a>

                    <a class="btn btn-danger pull-right text-white" data-toggle="modal" data-target="#deleteModal"><i
                            class="fas fa-trash"></i> Eliminar</a>

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro que deseas eliminar este elemento? NO podrás recuperarlo.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fas fa-times"></i> Cancelar</button>
                                    <form action="{{ route('file.destroy', $image->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-danger pull-right"><i
                                                class="fas fa-trash"></i> Confirmar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @empty
        <div class="container mb-3">
            <div class="alert alert-warning" role="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
                <strong>¡Atención!</strong> No se encontraron imágenes
            </div>
        </div>
        @endforelse
    </div>
</div>


@endsection

