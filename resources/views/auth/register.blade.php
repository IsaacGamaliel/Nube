@extends('frontend.layouts.app')

@section('content')
<main role="main">
   <section class="jumbotron text-center mb-0">
      <div class="row pt-5">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header">{{ __('Registro') }}</div>

                         <div class="card-body">
                           <img src="{{ asset('img/auth/register.svg') }}" class="mb-5 mt-3" width="100">

                             <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                 @csrf

                                 <div class="form-group row">
                                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                                     <div class="col-md-6">
                                         <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                         @if ($errors->has('name'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                     <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                                     <div class="col-md-6">
                                         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                         @if ($errors->has('email'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                     <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario (Username)') }}</label>

                                     <div class="col-md-6">
                                         <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                         @if ($errors->has('username'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('username') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required>

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group row">
                                     <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                     <div class="col-md-6">
                                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                         @if ($errors->has('password'))
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('password') }}</strong>
                                             </span>
                                         @endif
                                     </div>
                                 </div>

                                 <div class="form-group row">
                                     <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma contraseña') }}</label>

                                     <div class="col-md-6">
                                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                     </div>
                                 </div>

                                 <div class="form-group row mb-0">
                                     <div class="col-md-6 offset-md-4">
                                         <button type="submit" class="btn btn-primary">
                                             {{ __('Registrarse') }}
                                         </button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   </section>
</main>
@endsection
