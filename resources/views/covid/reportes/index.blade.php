@extends('layouts.app')
@section('title', 'Personal')
@section('content')

 <div class="page-content">
  <div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Parsonal Registado en el Sistema</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{ $personal }}</h4>
                   {{--  <small class="text-success">(+29%)</small> --}}
                  </div>
                  <small>Total Personal</small>
                </div>
                <span class="badge bg-label-primary rounded p-2">
                  <i class="bx bx-user bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Pruebas en Existencia</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{ $list_existencia[0]['existencia'] }}</h4>
                    {{-- <small class="text-success">(+18%)</small> --}}
                  </div>
                  <small>Total</small>
                </div>
                <span class="badge bg-label-danger rounded p-2">
                 <i class='bx bx-plus-medical bx-sm'></i>
                </span>
              </div>
            </div>
          </div>
        </div>
       </div>

                       <!-- / modulos -->
                  <div class="col-md-12 col-lg-8 ">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-6 mb-6">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="card-body pb-0 px-0 px-md-0">
                          <img src="../../assets/img/illustrations/inventario.jpg" height="80" alt="View Badge User" data-app-dark-img="illustrations/inventario.jpg" data-app-light-img="illustrations/acompanamiento-empleados.html">
                        </div>
                            
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Inventario</h4>
                              <a href="#Modal2" class="text-success fw-semibold">
                                <div data-i18n="Ejecutar Reporte">Ejecutar Reporte</div>
                              </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-6 mb-6">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="card-body pb-0 px-0 px-md-0">
                          <img src="../../assets/img/illustrations/covid-graph.png" height="80" alt="View Badge User" data-app-dark-img="illustrations/covid-graph.png" data-app-light-img="illustrations/visitante.html">
                        </div>
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Pruebas Efectuadas</h4>
                             <a href="#" class="text-success fw-semibold">
                                <div data-i18n="Ejecutar Reporte">Ejecutar Reporte</div>
                              </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

    </div>
    @include('covid.reportes.modal.prueba')
  </div>


@endsection

@push('styles')
 <!-- gridjs css -->
 <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
 
@endpush

@push('scripts')
<script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="/assets/js/forms-selects.js"></script>
  <script>


 //va a la ruta para la condulta del recor y manda id       
  $(document).on("click", ".btnCsta", function(){           

      fila = $(this).closest("tr");

      id  = parseInt(fila.find('td:eq(0)').text()); //capturo el ID 

      id = btoa(id); // Base64 encode the String 

      var opcion = 2;

      window.location="consulta?id="+id;
            
  });

//submit para insertar de la modal
$('#form_prueba').submit(function(e){                        
    e.preventDefault(); 
   
   /* fecha = $.trim($('#flatpickr-range').val());    
    resultado = $.trim($('#apellido').val());
    observacion = $.trim($('#status').val());
    id_personal = $.trim($('#id_personal').val());*/
   
    var data = $('#form_prueba').serialize();        
    $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');             
    $.ajax({
          //url: "/user/" + user_id,
          url: "movimientos",
          headers: {'X-CSRF-TOKEN': $('#form_prueba #_token').val()},
          type: "POST", 
          cache: false,  
          data:  data, 
        success: function (response) {

          var json = $.parseJSON(response);
          console.log(json.user_id);
          var id = btoa(json.user_id);

          Swal.fire({
                      title:'¡Datos Insertados!',
                      text:'Datos Ingresados con Exito',
                      icon:"success",
                      customClass:{confirmButton:"btn btn-primary"},
                      buttonsStyling:!1
                    })

          $('#Modal1').modal('hide');
          window.location="consulta?id="+id;

        },error: function (data) {
          var errors = data.responseJSON;
          $.each( errors.errors, function( key, value ) {
            toastr.error(value);
            return false;
          });
          //$('input').iCheck('enable');
          $('#main-form input, #main-form button').removeAttr('disabled');
          $('#ajax-icon').removeClass('fas fa-spin fa-sync-alt').addClass('far fa-save');
        }
     });        
                                   
});

$('#Modal2').modal('toggle');
$('#Modal2').modal('show')

 
</script>


@endpush