@extends('admin.layouts.app')

@section('page', 'Videos')

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

                @foreach($videos as $video)
            <tr>
                
                <th scope="row">
                    <img clas="img-responsive" src="{{asset('img/logo_Sin_fondo.png')}}" alt="">
                </th>
                <th scope="row">{{$video->name}}</th>
                <th scope="row">{{$video->created_at->DiffForHumans()}}</th>
                <th scope="row"><a clas="btn btn-primary" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/video/{{ $video->name }}.{{ $video->extension }}"><i clas="fas fa-eye"></i> Ver</a></th>
                <th scope="row"><a clas="btn btn-danger" href=""><i clas="fas fa-trash">Eliminar</a></th>

            </tr>
            </tbody>
            @endforeach
            </table>
        </div>
  
    </div>
</div>




@endsection

