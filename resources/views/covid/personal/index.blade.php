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
                  <span>Parsonal Activo</span>
                  <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{ App\Models\Personal::count() }}</h4>
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
                <div class="card-datatable table-responsive">
                  <table class="datatables-users table border-top table-sm" id="tablaModulos">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Gerencia</th>
                        <th></th>
                      </tr>
                    </thead>
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
            'excel', 'pdf', 'print','colvis'
        ],
    "ajax":{            
        "url": "{{ url('personals') }}", 
        "method": 'GET', //usamos el metodo POST
        "dataSrc":""
    },
    "columns":[
        {"data": "id_personal"},
        {"data": "cedula"},
        {"data": "tx_nombres"},
        {"data": "tx_apellidos"},
        {"data": "id_gerencia"},
        
        
        {"defaultContent": " <div class='btn-group'><button class='btn btn-primary btn-sm btn-circle btnPrb'><i class='mdi mdi-clipboard-check' data-toggle='tooltip' data-placement='top' title='Cargar Resultado'></i></button><button class='btn btn-success  btn-sm btn-circle btnCsta'><i class='mdi mdi-account-search' data-toggle='tooltip' data-placement='top' title='Historico de Pruebas'></i></button></div>"}
    ]
});
    var fila; //captura la fila, para editar o eliminar
//levanta la modal para colocar el resultado de la prueba        
$(document).on("click", ".btnPrb", function(){           

    opcion = 2;//editar
    
    //console.log(status);
    
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
$('#main-form').submit(function(e){                        
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    name = $.trim($('#nombreusuario').val());    
    last_name = $.trim($('#apellido').val());
    status = $.trim($('#status').val());
    username = $.trim($('#usuario').val());
    codigo = $.trim($('#txtCodigo').val());  
    var data = $('#main-form').serialize();        
    $('#ajax-icon').removeClass('far fa-save').addClass('fas fa-spin fa-sync-alt');             
    $.ajax({
         url: "/user/" + user_id,
          headers: {'X-CSRF-TOKEN': $('#main-form #_token').val()},
          type: "PUT",
          datatype:"json",  
          cache: false,  
          data:  data, 
        success: function (response) {
          var json = $.parseJSON(response);
          if(json.success){
            $('#main-form #edit-button').removeClass('hide');

            tablaModulos.ajax.reload(null, false);
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
          $('#main-form input, #main-form button').removeAttr('disabled');
          $('#ajax-icon').removeClass('fas fa-spin fa-sync-alt').addClass('far fa-save');
        }
     });        
    $('#ModulosEdit').modal('hide');                                
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