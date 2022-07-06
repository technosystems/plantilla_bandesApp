@extends('layouts.app')
@section('title', 'Personal')
@section('content')

 <div class="page-content">
  <div class="container-fluid">

       <div class="row">
          <div class="col-sm-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="card-datatable table-responsive">
                 
                  <table class="datatables-users table border-top table-sm" id="tablaModulos">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Laboral</th>
                        <th>Resultado</th>
                        <th>Observación</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                     <tbody>
                      @foreach ($datos as $row)
                          <tr class="row{{ $row->id }}">
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->desde. " / " .$row->hasta }}</td>
                           <td>{{ $row->id_personal }}</td>
                          <td>{{ $row->id_personal }}</td>
                          <td>{{ $row->id_personal }}</td>
                          <td>{{ $row->id_personal }}</td>
                          @php
                            if($row->resultado == 1)
                            {
                              $resultado = "Negativo";
                            }
                            else{
                            $resultado = "Positivo";
                          }

                          @endphp
                          <td>{{ $resultado }}</td>
                          <td>{{ $row->observacion }}</td>
                          <td>
                           <div class="btn-group">

                              <form action="{{ route('pdfrecibo', $row->id) }}" method="GET" target="_blank " 
                              style="display: inline-block;">
                              @csrf
                             
                              <button class="btn btn-sm btn-primary" type="submit" >
                               <i class="mdi mdi-printer mt-2 text-white" data-toggle="tooltip" data-placement="top" title="Imprimir Comprobante."></i>
                              </button>
                            </form>
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
   $('#tablaModulos').DataTable({

    "order": [[ 0,"desc" ]],

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
        
         responsive:true,
         lengthChange: true,
         dom: 'Bfrtip',
         buttons: [
            //'copy', 'csv', 'excel', 'pdf','print',
            { extend: 'pdf', className: 'btn-primary' },
            { extend: 'copy', className: 'btn-primary' },
            { extend: 'csv', className: 'btn-primary' },
            { extend: 'print', className: 'btn-primary' },
           // { extend: 'print', text: '<i class="fas fa-print"></i> Print',className: 'btn-primary' },
            
        ],
  });

   

  </script>

@endpush