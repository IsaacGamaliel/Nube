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

                            @if($document->extension == 'pdf' || $document->extension==
                            'PDF')
                            <img class="img-responsive" src="{{asset('img/pdf.png')}}"
                             width="50">
                            @endif
                            @if($document->extension == 'xlsx' || $document->extension==
                            'XLSX')
                            <img class="img-responsive" src="{{asset('img/excel.png')}}"
                             width="50">
                            @endif
                            @if($document->extension == 'docx' || $document->extension==
                            'DOCX')
                            <img class="img-responsive" src="{{asset('img/word.png')}}"
                             width="50">
                            @endif

                        </th>
                        <th scope="row">{{$document->name}}</th>
                        <th scope="row">{{$document->created_at->DiffForHumans()}}</th>
                        <th scope="row">
                            @if($document->extension == 'pdf' || $document->extension==
                            'PDF')
                            <a class="btn btn-primary" style="width: 55%;" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a>
                            @else
                            <a class="btn btn-success" style="width: 55%;" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a
                            >
                            @endif
                            
                        </th>
                        <th scope="row"><a clas="btn btn-danger pull-right" href=""><i clas="fas fa-trash">Eliminar</a></th>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

    </div>
</div>


@endsection