@extends('layouts.app')
@section('title', 'Visitante')

@section('content')
 <div class="page-content">
  <div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>Visitantes</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{ $visitante }}</h4>
                   {{--  <small class="text-success">(+29%)</small> --}}
                  </div>
                  <small>Total Visitantes</small>
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
                    <h4 class="mb-0 me-2">{{ $list_existencia[0]['existencia'] }}  @php $exitencia = $list_existencia[0]['existencia'];   @endphp</h4>
                    {{-- <h4 class="mb-0 me-2">{{ App\Models\Existencia::obtenerExistencia() }}</h4>--}}
                    {{-- <small class="text-success">(+18%)</small> --}}
                  </div>
                  <small>Total general de usuarios</small>
                </div>
                <span class="badge bg-label-danger rounded p-2">
                  <i class="bx bx-user-plus bx-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>

       </div>
       <div class="row">
          <div class="col-sm-12 col-xl-12">
            <div class="card">

              <div class="card-body">

                 <!-- Nuevo Visitante -->
                 <div class="col-12 mb-3">
                    <button class="btn btn-primary btn-md btnNew" tabindex="0" aria-controls="DataTables_Table_0" type="button" ><span>Nuevo Visitante</span>
                    </button>
                  </div>


                 <!-- Fin Nuevo Visitante -->

                <div class="card-datatable table-responsive">
                  <table class="datatables-users table border-top table-sm" id="tablaModulos">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                         <th>Estatus</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
    @include('covid.visitante.modal.prueba')

  </div>

     <!--  Modal Nuevo visitante-->
      <div class="modal fade" id="newVisitanteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                  <h3> Ingrese nuevo Visitante</h3>
              </div>
              {!! Form::open(['route' => ['visitante.store'],'method' => 'POST', 'id' => 'form_nuevo_visitante'], ) !!}
                        <div class="col-12 mb-3">
                        <label class="form-label" for="modalPermissionName">Nombre:</label>
                        <input type="text" name="tx_nombres" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Ingrese el nombre." autofocus required />
                        </div>
                        <div class="col-12 mb-3">
                        <label class="form-label" for="modalPermissionName">Apellido:</label>
                        <input type="text" name="tx_apellidos" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Ingrese el apellido." autofocus required />
                        </div>
                        <div class="col-12 mb-3">
                        <label class="form-label" for="modalPermissionName">Cedula:</label>
                        <input type="text" name="cedula" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Ingrese el apellido." autofocus required />
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                        <label for="flatpickr-range2" class="form-label">Rango de Duración:</label>
                        <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range2" name="flatpickr_range2" />
                        </div>
                        <div class="col-xxl-12">
                        <div class="col-md">
                        <small class="form-label">Resultado de la Prueba:</small>
                        <div class="form-check mt-3">
                        <input name="default_radio" class="form-check-input" type="radio" value="2" id="defaultRadio3" />
                        <label class="form-check-label" for="defaultRadio3">
                        Positivo
                        </label>
                        </div>
                        <div class="form-check">
                        <input name="default_radio" class="form-check-input" type="radio" value="1" id="defaultRadio4" checked />
                        <label class="form-check-label" for="defaultRadio4">
                        Negativo
                        </label>
                        </div>
                        </div>
                        <div class="col-xxl-12">

                        <div class="mb-3">
                        <label for="defaultInput" class="form-label">Observaciones</label>
                        <input id="observaciones" name="observaciones" class="form-control" type="text" placeholder="Observaciones" />
                        </div>
                        </div>
                        <div class="col-12 text-center demo-vertical-spacing">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                        </div>
              {!! Form::close()!!}
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modal Nuevo visitante -->

@endsection

@push('styles')
 <!-- gridjs css -->
 <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')

  <script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="/assets/js/forms-selects.js"></script>

  <script>

      var user_id, opcion;
      opcion = 4;
      tablaModulos =  $('#tablaModulos').DataTable({
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
                },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
          dom: 'Bfrtip',
          responsive:false,
          lengthChange: true,
          buttons: [
                    //'copy', 'csv', 'excel', 'pdf','print',
                    { extend: 'pdf', className: 'btn-primary' },
                    { extend: 'copy', className: 'btn-primary' },
                    { extend: 'csv', className: 'btn-primary' },
                    { extend: 'print', className: 'btn-primary' },
                    // { extend: 'print', text: '<i class="fas fa-print"></i> Print',className: 'btn-primary' },
                  ],
          "ajax":{
          "url": "{{ url('visitantes') }}",
          "method": 'GET', //usamos el metodo POST
          "dataSrc":""
          },
          "columns":[
                      {"data": "id_personal"},
                      {"data": "cedula"},
                      {"data": "tx_nombres"},
                      {"data": "tx_apellidos"},
                      {"data": "id_estatus"},

                      {"defaultContent": " <div class='btn-group'><button class='btn btn-primary btn-sm btn-circle btnPrb'><i class='bx bx-detail' data-toggle='tooltip' data-placement='top' title='Registrar Resultado'></i></button><button class='btn btn-success btn-sm btn-circle btnCsta'><i class='bx bx-link-alt'  data-toggle='tooltip' data-placement='top' title='Histórico de pruebas'></i></button></div>"}
          ]
      }); //FIN DE  tablaModulos
      var fila; //captura la fila, para editar o eliminar

      var valida_ext = "<?php echo $exitencia; ?>";

    /************** levanta la modal para registrar los datos del resultado de la prueba covid ********/
    $(document).on("click", ".btnPrb", function(){

      fila2 = $(this).closest("tr");

      id  = parseInt(fila2.find('td:eq(0)').text()); //capturo el ID

        if(valida_ext > 0)
        {
          $('#id_personal').val(id);
          
          $(".modal-title").text("Ingresar Resultado de la Prueba"); 

          $('#Modal1').modal('show');  
        }else{

          Swal.fire({
              title:'Alerta!',
              text:'No hay Exsistencia de Pruebas en el Inventario',
              icon:"warning",
              customClass:{confirmButton:"btn btn-primary"},
              buttonsStyling:!1
            })

        }

      //$('#id_personal').val(id);
      //$(".modal-title").text("Ingresar Resultado de la Prueba");
      //$('#Modal1').modal('show');
    });

    /************** va a la ruta para la consulta del recor y manda id ********/
    $(document).on("click", ".btnCsta", function(){

    fila = $(this).closest("tr");

    id  = parseInt(fila.find('td:eq(0)').text()); //capturo el ID

    id = btoa(id); // Base64 encode the String

    var opcion = 2;

    window.location="consulta?id="+id;
    });

    /**************REGISTRAR RESULTADO DE LA PRUEBA CUANDO EL VISITANTE YA EXISTE  ********/
    $('#form_prueba').submit(function(e){
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      var data = $('#form_prueba').serialize();
      $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');
      $.ajax({
                //url: "/user/" + user_id,
                url: "movimientos",
                headers: {'X-CSRF-TOKEN': $('#form_prueba #_token').val()},
                type: "POST",
                // datatype:"json",
                cache: false,
                data:  data,
                success: function (response)
                {
                    var json = $.parseJSON(response);
                    console.log(json.user_id);
                    var id = btoa(json.user_id);

                    Swal.fire({
                              title:'¡Datos Insertados!!!!!',
                              text:'Datos Ingresados con Exito',
                              icon:"success",
                              customClass:{confirmButton:"btn btn-primary"},
                              buttonsStyling:!1
                            })

                    $('#Modal1').modal('hide');
                     window.location="consulta?id="+id;

                },error: function (data)
                {
                    var errors = data.responseJSON;
                    $.each( errors.errors, function( key, value )
                        {
                          toastr.error(value);
                          return false;
                        });
                    //$('input').iCheck('enable');
                    $('#main-form input, #main-form button').removeAttr('disabled');
                    $('#ajax-icon').removeClass('fas fa-spin fa-sync-alt').addClass('far fa-save');
                }
             });
    });

    /**************REGISTRAR RESULTADO DE LA PRUEBA PARA UN NUEVO VISITANTE  ********/
      $('#form_nuevo_visitante').submit(function(e){
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      var data = $('#form_nuevo_visitante').serialize();
      $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');
      $.ajax({
                //url: "/user/" + user_id,
                //url: "movimientos",
                url: "visitante",
                headers: {'X-CSRF-TOKEN': $('#form_nuevo_visitante #_token').val()},
                type: "POST",
                // datatype:"json",
                cache: false,
                data:  data,
                success: function (response)
                {
                    var json = $.parseJSON(response);
                    console.log(json.user_id);
                    var id = btoa(json.user_id);

                    Swal.fire({
                              title:'¡Datos Insertados!!!!!',
                              text:'Datos Ingresados con Exito',
                              icon:"success",
                              customClass:{confirmButton:"btn btn-primary"},
                              buttonsStyling:!1
                            })

                    $('#newVisitanteModal').modal('hide');
                     window.location="consulta?id="+id;

                },error: function (data)
                {
                    var errors = data.responseJSON;
                    $.each( errors.errors, function( key, value )
                        {
                          toastr.error(value);
                          return false;
                        });
                    //$('input').iCheck('enable');
                    $('#main-form input, #main-form button').removeAttr('disabled');
                    $('#ajax-icon').removeClass('fas fa-spin fa-sync-alt').addClass('far fa-save');
                }
             });
    });

    
   $(document).on("click", ".btnNew", function(){


      if(valida_ext > 0)
      {
        $('#newVisitanteModal').modal('show');
      }else{

       $('#newVisitanteModal').modal('hide');
        Swal.fire({
            title:'Alerta!',
            text:'No hay Exsistencia de Pruebas en el Inventario',
            icon:"warning",
            customClass:{confirmButton:"btn btn-primary"},
            buttonsStyling:!1
          })

      }
 });

  </script>

@endpush