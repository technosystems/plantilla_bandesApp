@extends('layouts/auth')

@section('title', 'Login Page')

@section('content')
@php
$mytime = Carbon\Carbon::now('America/Caracas');
$fecha=$mytime->format('Y-m-d');

$today = getdate();
$data_month = ['Enero',
               'Febrero',
               'Marzo',
               'Abril','
                Mayo',
               'Junio',
               'Julio',
               'Agosto',
               'Septiembre',
               'Octubre',
               'Noviembre',
               'Diciembre'];
//$config = \DB::table('configuraciones')->first();
$current_month = $today['mon'];
$current_year = $today['year'];
$mes_actual =$data_month[$current_month - 1];
//dd($mes_actual);

$nombre_dia = date('w');
switch($nombre_dia)
{
    case 1: $nombre_dia="Lunes";
    break;
    case 2: $nombre_dia="Martes";
    break;
    case 3: $nombre_dia="Miércoles";
    break;
    case 4: $nombre_dia="Jueves";
    break;
    case 5: $nombre_dia="Viernes";
    break;
    case 6: $nombre_dia="Sabado";
    break;
}

@endphp
  <div class="auth-wrapper auth-v3 ">

    <div class="auth-content">
        <div class="card">
            <div class="row align-items-stretch ">
                <div class="col-md-6 img-card-side">
                    <img src="{{ asset('assets/img/auth-img-3.jpg') }}" alt="" class="img-fluid">
                    <div class="img-card-side-content">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                       <div>
                            <h5 class="text-primary">¡Bienvenidos!</h5>
                            <p class="text-muted small">Ingresa tu usuario y contraseña para continuar.</p>
                        </div>
                        <form id="main-form" id="formAuthentication" class="mb-3"  >
                         <input type="hidden" id="_url" value="{{ url('login') }}">
                         <input type="hidden" id="_redirect" value="{{ url('') }}">
                         <input type="hidden" id="_token" value="{{ csrf_token() }}">
                         <div class="mb-3">
                           <label class="form-label" for="password">Correo electrónico</label>
                          <input id="email"
                                 type="text"
                                 class="form-control
                                 @error('email') is-invalid @enderror"
                                 id="email"
                                 autocomplete="off"
                                 name="email"
                                 value="{{ old('email') }}"
                                 placeholder="example@mail.com"
                                 autocomplete="email" autofocus>
                            <span class="missing_alert text-danger small" id="email_alert"></span>
                           {{--  @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror --}}
                         </div>
                         <div class="mb-3 form-password-toggle">
                           <div class="d-flex justify-content-between">
                             <label class="form-label" for="password">Contraseña</label>

                           </div>
                           <div class="input-group input-group-merge">
                             <input type="password"
                                    id="password"
                                    autocomplete="off"
                                    class="form-control"
                                    name="password"
                                    placeholder="Ingresa la contraseña;"
                                    aria-describedby="password" />
                              <span class="input-group-text cursor-pointer">
                               <i class="bx bx-hide"></i></span>
                           </div>
                         </div>

                          <button type="submit" class="btn btn-primary form-control mt-3" id="boton">
                               <i class="fas fa-sign-in-alt text-white"
                                  id="ajax-icon">
                               </i>
                               <span class="text-white ml-3 mensaje" >
                                 {{ __('Iniciar Sesión') }}
                               </span>
                           </button>
                           <div class="text-center">
                                     <div class="text-center mt-5 mb-4 ">
                                       <span id="weekDay" class="weekDay">

                                       </span>,
                                       <span id="day" class="day"></span> de
                                       <span id="month" class="month">

                                       </span> del
                                       <span id="year" class="year">

                                       </span> ,
                                       <span id="hours" class="hours"></span> :
                                       <span id="minutes" class="minutes"></span>

                                     </div>

                                 </div>
                          </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
     <script src="{{ asset('js/admin/auth/login.js') }}"></script>
     <script src="{{ asset('js/clock.js') }}"></script>
@endpush
