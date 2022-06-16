@extends('admin.layouts.app')

@section('content')
     <form action="{{route('file.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">
                Selecciona un archivo para subirlo
            </label>
            <input type="file" class="form-control-file" name="file" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary file">Subir archivo</button>
        </div>
     </form>
@endsection