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
                    <h4 class="mb-0 me-2">{{ App\Models\Visitante::count() }}</h4>
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
                      <h4 class="mb-0 me-2">{{ $list_existencia[0]['existencia'] }}</h4>
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

                 <!-- Nuevo Visitante
                <a class="btn btn-primary btn-md" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" aria-controls="offcanvasAddUser"><span class="text-white">Nuevo Visitante</span></a> -->


                  <button class='dt-button create-new btn btn-primary btnNewVisitante'>
                    <i class='' data-toggle='tooltip' data-placement='top' title='Nuevo Visitante'>Nuevo Visitante</i>
                  </button>


                 <!-- Fin Nuevo Visitante -->

                <div class="card-datatable table-responsive">
                  <table class="datatables-users table border-top table-sm" id="tablaModulos">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Gerencia</th>
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
  @include('covid.visitante.modal.newvisitante')
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
          {"data": "id_gerencia"},
          {"data": "id_estatus"},

          {"defaultContent": " <div class='btn-group'><button class='btn btn-primary btn-sm btn-circle btnPrb'><i class='bx bx-detail' data-toggle='tooltip' data-placement='top' title='Registrar Resultado'></i></button><button class='btn btn-success btn-sm btn-circle btnCsta'><i class='bx bx-link-alt'  data-toggle='tooltip' data-placement='top' title='Histórico de pruebas'></i></button></div>"}
          ]
      });
      var fila; //captura la fila, para editar o eliminar


      /************** levanta la modal para registrar un NUEVO VISITANTE ********/
      $(document).on("click", ".btnNewVisitante", function(){

        fila2 = $(this).closest("tr");

        id  = parseInt(fila2.find('td:eq(0)').text()); //capturo el ID

        $('#id_personal').val(id);

        $(".modal-title").text("Ingresar Resultado de la Prueba");

        $('#Modal3').modal('show');

      });

      /************** levanta la modal para registrar los datos del resultado de la prueba covid ********/
      $(document).on("click", ".btnPrb", function(){

        fila2 = $(this).closest("tr");

        id  = parseInt(fila2.find('td:eq(0)').text()); //capturo el ID

        $('#id_personal').val(id);

        $(".modal-title").text("Ingresar Resultado de la Prueba");

        $('#Modal1').modal('show');

      });
//va a la ruta para la condulta del recor y manda id
  $(document).on("click", ".btnCsta", function(){

      fila = $(this).closest("tr");

      id  = parseInt(fila.find('td:eq(0)').text()); //capturo el ID

      id = btoa(id); // Base64 encode the String

      var opcion = 2;

      window.location="consulta?id="+id;

  });
      //submit para el Alta y Actualización
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
                                title:'¡Datos Insertados!',
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

      //submit para guardar el nuevo visitante
      $('#form_newvisitante').submit(function(e){
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        var data = $('#form_newvisitante').serialize();
        $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');
        $.ajax({
                  //url: "/user/" + user_id,
                  url: "movimientos",
                  headers: {'X-CSRF-TOKEN': $('#form_newvisitante #_token').val()},
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
                                title:'¡Datos Insertados!',
                                text:'Datos Ingresados con Exito',
                                icon:"success",
                                customClass:{confirmButton:"btn btn-primary"},
                                buttonsStyling:!1
                              })
                      $('#Modal3').modal('hide');
                      window.location="visitante?id="+id;
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

  </script>

  <script>

      $('#edit-button').hide();
       newUserForm.on('submit', function (e) {
        var isValid = newUserForm.valid();
        e.preventDefault();

         if (isValid) {
           var data = $('#usuarios-form').serialize();
          //$('input').iCheck('disable');
          //$('#usuarios-form input, #usuarios-form button').attr('disabled','true');
          $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');

              $.ajax({
                url: $('#usuarios-form #_url').val(),
                headers: {'X-CSRF-TOKEN': $('#usuarios-form #_token').val()},
                type: 'POST',
                cache: false,
                data: data,
                success: function (response) {
                  var json = $.parseJSON(response);
                  if(json.success){

                    $('#usuarios-form #submit').hide();
                    $('#usuarios-form #edit-button').attr('href', $('#usuarios-form #_url').val() + '/' + json.user_id + '/edit');
                    $('#usuarios-form #edit-button').removeClass('hide');
                    tablaModulos.ajax.reload(null, false);
                    var timerInterval;
                    Swal.fire({

                         title:'¡Bien hecho!',
                        text:'Datos ingresados',
                        icon:"success",
                        customClass:{confirmButton:"btn btn-primary"},
                        buttonsStyling:!1
                      })


                 }
                },error: function (data) {
                  var errors = data.responseJSON;
                  $.each( errors.errors, function( key, value ) {
                    toastr.error(value);
                    return false;
                  });
                  //$('input').iCheck('enable');
                  $('#formModulos input, #main-form button').removeAttr('disabled');
                  $('#ajax-icon').removeClass('fas fa-spin fa-sync-alt').addClass('far fa-save');
                }
             });


         }
         else
         {
           return false;
         }
      });
  </script>

  <script>
   /* $(document).on("click", ".btnBorrar", function(e){
      e.preventDefault();
      fila = $(this);
      user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;
      opcion = 3; //eliminar
      Swal.fire({
          title: '¿Estás seguro(a)?',
          text: "¡Si confirmas no habrá marcha atrás!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: '¡Eliminar!',
          customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
          },
          buttonsStyling: false
        }).then(function (result) {
          if (result.value) {
          $.ajax({
            url: "/users/"+user_id+'/delete' ,
            type: "GET",
            datatype:"json",

            success: function() {
                tablaModulos.row(fila.parents('tr')).remove().draw();
                 var timerInterval;
                    Swal.fire({
                      title: '¡Datos eliminados!',
                      icon: 'success',
                      timer: 1000,
                      timerProgressBar: false,
                      didOpen: () => {
                        Swal.showLoading();
                        timerInterval = setInterval(() => {
                          const content = Swal.getHtmlContainer();
                          if (content) {
                            const b = content.querySelector('b');
                            if (b) {
                              b.textContent = Swal.getTimerLeft();
                            }
                          }
                        }, 100);
                      },
                      willClose: () => {
                        clearInterval(timerInterval);
                      }
                    }).then(result => {
                      /// Read more about handling dismissals below
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer');
                      }
                    });
             }
          });

          }
        });
    });*/
  </script>
@endpush