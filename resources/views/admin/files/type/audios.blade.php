@extends('admin.layouts.app')

@section('page', 'Audios')

@section('content')
<div class="container">

    <div class="row">
        @foreach($audios as $audio)
        <div class="col-sm-12 col-md-4 pb-4">

        <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" controls></audio>
            
        </div>
        @endforeach
    </div>
</div>

</div>


@endsection