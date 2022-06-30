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
                    <th scope="col">Subidos</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Eliminar</th>


                </tr>
            </thead>
            <tbody>

                @foreach($documents as $document)
            <tr>
                
                <th scope="row">
                    
                    <img clas="img-responsive" src="{{asset('img/logo_Sin_fondo.png')}}" alt="">
                </th>
                <th scope="row">{{$document->name}}</th>
                <th scope="row">{{$document->created_at->DiffForHumans()}}</th>
                <th scope="row"><a clas="btn btn-primary" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i clas="fas fa-eye"></i> Ver</a></th>
                <th scope="row"><a clas="btn btn-danger" href=""><i clas="fas fa-trash">Eliminar</a></th>

            </tr>
            </tbody>
            @endforeach
            </table>
        </div>
  
    </div>
</div>




@endsection

