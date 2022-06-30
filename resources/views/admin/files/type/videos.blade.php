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
                            @if($video->extension == 'mp4' || $video->extension == 'MP4')
                                <img class="img-responsive" src="{{ asset('img/files/mp4.svg') }}" width="50">
                            @endif
                            @if($video->extension == 'avi' || $video->extension == 'AVI')
                                <img class="img-responsive" src="{{ asset('img/files/avi.svg') }}" width="50">
                            @endif
                            @if($video->extension == 'mpeg' || $video->extension == 'MPEG')
                                <img class="img-responsive" src="{{ asset('img/files/mpeg.svg') }}" width="50">
                            @endif
                        </th>
                        <th scope="row">{{$video->name}}</th>
                        <th scope="row">{{$video->created_at->DiffForHumans()}}</th>
                        <th scope="row"><a class="btn btn-primary" target="_blank"
                                href="{{ asset('storage') }}/{{ $folder }}/video/{{ $video->name }}.{{ $video->extension }}"><i
                                    class="fas fa-eye"></i> Ver</a></th>
                        <th scope="row">
                            <a class="btn btn-danger text-white" href=""><i class="fas fa-trash"></i> Eliminar</a>
                        </th>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection