@extends('layouts.app')
@section('title', 'Personal')
@section('content')

@php $tipo = $model[0]['tipo'];   @endphp

 <div class="page-content">
  <div class="container-fluid">
              
              <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Configurar la Asistencia</h5>
                          <p class="mb-4">Modulo para Configurar la Asistencia de los Empleados a las Pruebas de Hisopados. </p>
                          <p class="mb-4">Esta puede ser: <span class="fw-bold">General</span>: Todos los Empleados Activos. <span class="fw-bold">Lista</span>: Solo los Empleados que previamente esten Convocados por medio de una lista. </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="../../assets/img/illustrations/covid-graph.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/covid-graph.png" data-app-light-img="illustrations/man-with-laptop-light.html">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                       <!-- / modulos -->
                  <div class="col-md-12 col-lg-8 ">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-12 mb-12">
                        <div class="card">
                          <div class="card-body">
                            {!! Form::open(['route' => ['convocatoria.store'],'method' => 'POST', 'id' =>'myform']) !!}
                              <div class="col-12 mb-3">
                                <label class="form-label" for="modalPermissionName">Tipo de Convocatoria</label>
                                <select class="form-control" name="tipo_convoca" id="tipo_convoca">
                                  <option value="2">General</option>
                                  <option value="1">Lista</option>
                                </select>
                              </div>
                              <div class="col-12 text-center demo-vertical-spacing">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="btoNew">Nueva Convocatoria</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                              </div>
                             {!! Form::close()!!}
                             
                          </div>
                        </div>
                      </div>
                     

                    </div>
                  </div>

    </div>
    
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

    $( document ).ready(function() {
        //console.log( "ready!" );
         var tipo = "<?php echo $tipo; ?>";

         if(tipo == 1)
         {
          $("#tipo_convoca").val('1');
         }
         if(tipo == 2)
         {
           $("#tipo_convoca").val('2');
         }
    });

      /*$(document).on("click", ".btoNew", function(){           

     
     });*/

      $("#myform").on('submit', function(evt){
        evt.preventDefault();  
      var $this = $(this);

      Swal.fire({  
        title: 'Esta Operacion Eliminara la Lista Anterior',  
        showCancelButton: true,  
        confirmButtonText: `Guardar`,  
      }).then((result) => {  

          if (result) {    
            //Swal.fire('Saved!', '', 'success')
             //$this.submit();
             document.forms["myform"].submit();

          } else {    
            //Swal.fire('Operacion Cancelada', '', 'info')
            evt.preventDefault();   
        }
      });

       });

</script>


@endpush