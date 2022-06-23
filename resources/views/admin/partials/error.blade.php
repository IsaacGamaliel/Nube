

        @if($errors->any())
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>

                @foreach($errors->all() as $error)
                @if($error == 'validation.mimes')
                <strong>¡Error!</strong>No se puede subir este formato de archivo
                @endif
                @if($error == 'validation.max.file')
                <strong>¡Error!</strong>El archivo supera el maximo permitido
                @endif
                @endforeach
            </div>
        </div>
        @endif