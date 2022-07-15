@extends('layouts.app')
@section('title', 'Personal')
@section('content')

 <div class="page-content">
  <div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-sm-12 col-xl-12">
          <div class="card">
            <div class="card-body">
            
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <h6 class="alert-heading d-flex align-items-center fw-bold mb-1 col-sm-10 col-xl-10">Aviso Importante Lista de Convocados!!</h6>
                  <p class="mb-0">Es Importante tener en cuenta que esta lista se renueva cada vez q se va al modulo de <b>Convocados</b> y se elije la opcion Lista. </p>
                 
                </div>
             
            </div>
          </div>
        </div>

        
       </div>
       <div class="row">
          <div class="col-sm-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="card-datatable table-responsive">
                  <table class="datatables-users table border-top table-sm" id="tablaModulos">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Gerencia</th>
                        <th>Condición</th>
                         <th>Convocar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($datos as $row)
                          <tr class="row{{ $row->id_personal }}">
                          <td>{{ $row->id_personal }}</td>
                          <td>{{ $row->cedula }}</td>
                          <td>{{ $row->tx_nombres }}</td>
                          <td>{{ $row->tx_apellidos }}</td>
                          <td>{{ $row->getgerencia->descripcion }}</td>

                              @php
                                if($row->convocado == 1)
                                {
                                  $convoca = "Convocado";
                                }
                                else{
                                  $convoca = "Remoto";
                                }
                              @endphp

                           <td>{{ $convoca }}</td>
                          <td>
                           <div class="btn-group">

                            <button class="btn btn-primary btn-sm btn-circle btnPrb">
                              <i class="bx bx-check" data-toggle="tooltip" data-placement="top" title="Incluir en Convocados"></i>
                            </button>

                           </div>

                          </td>
                          </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
    @include('covid.personal.modal.prueba')
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
           // 'copy', 'csv', 'excel', 'pdf','print'
            { extend: 'pdf', className: 'btn-primary' },
            { extend: 'copy', className: 'btn-primary' },
            { extend: 'csv', className: 'btn-primary' },
            { extend: 'print', className: 'btn-primary' },    
          ],
   
});
    var fila; //captura la fila, para editar o eliminar


$(document).on("click", ".btnPrb", function(){           

  // e.preventDefault();

  fila2 = $(this).closest("tr");

  id  = parseInt(fila2.find('td:eq(0)').text()); //capturo el ID 

  Swal.fire({
        title: '¿Estás Seguro?',
        text: "¡De incluir en la lista de Convocados!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Aceptar!',
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
        $.ajax({
          url: "/lista/"+id+'/edit' ,
          type: "GET",
          datatype:"json",

          success: function(response) {

              location.reload();
           }

        });
         
        }
      });

         
});

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

@endpush