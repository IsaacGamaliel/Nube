@extends('layouts.app')

@section('content')
<main role="main">
   <section class="jumbotron text-center mb-0">
      <div class="row pt-5">
         <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">{{ __('Ingresar a tu cuenta') }}</div>
                       <div class="card-body">
                           <img src="{{ asset('img/auth/login.svg') }}" class="mb-5 mt-3" width="100">

                           <form method="POST" action="{{ route('login') }}">
                               @csrf

                                <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Correo / Usuario') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('email') || $errors->has('username') ? ' is-invalid' : '' }}" name="username" minlength="5" maxlength="50" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required maxlength="10" minlength="6">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                               <div class="form-group row">
                                   <div class="col-md-12">
                                       <div class="form-check">
                                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                           <label class="form-check-label" for="remember">
                                               {{ __('Recordar Mis datos') }}
                                           </label>
                                       </div>
                                   </div>
                               </div>

                               <div class="form-group row mb-0">
                                   <div class="col-md-12 ml-4">
                                       <button type="submit" class="btn btn-info">
                                           {{ __('Ingresar') }}
                                       </button>

                                       <a class="btn btn-link" href="{{ route('password.request') }}">
                                           {{ __('Olvidaste la contraseña?') }}
                                       </a>

                                       <a class="btn btn-link" href="{{ route('register') }}">
                                           {{ __('¿No tienes una cuenta?') }}
                                       </a>
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
