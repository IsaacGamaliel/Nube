@extends('layouts.app')

@section('content')
<main role="main">
   <section class="jumbotron text-center mb-0">
      <div class="row pt-5">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-md-8">
                     <div class="card">
                         <div class="card-header">{{ __('Verifique su dirección de correo electrónico') }}</div>

                         <div class="card-body">
                             @if (session('resent'))
                                 <div class="alert alert-success" role="alert">
                                     {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                                 </div>
                             @endif

                             {{ __('Antes de continuar, verifique su correo electrónico para obtener un enlace de verificación.') }}
                             {{ __('Si no recibiste el correo electrónico') }}, <a href="{{ route('verification.resend') }}">{{ __('haga clic aquí para solicitar otro') }}</a>.
                         </div>
                     </div>
                 </div>
             </div>
         </div>
      </div>
   </section>
</main>
@endsection

