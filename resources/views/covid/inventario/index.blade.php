@extends('layouts.app')
@section('title','Permisos')
@section('page_title', 'Inventario de Pruebas Covid')
@section('content')
<div class="page-content">
    <div class="container-fluid">

  <div class="row">

      <div class="col-lg-12">
            <div class="card card-line-primary">
                <div class="card-header">
                  <p>Inventario de Pruebas Covid</p>
                </div>

                  <div class="card-body">
                    <div class="container-fluid">
                      <div class="row text-white text-center">
                        <div class="col-3" style="margin-left: -80px;">
                          <button class="dt-button add-new btn btn-primary mb-md-0" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><span>Agregar Pruebas</span>
                          </button>
                        </div>

                        <div class="col-9" style="margin-top: -20px;border-left-style: solid;border-left-width: 20px;">
                          <div class="avatar avatar-xl">
                            <span class="avatar-initial rounded-circle bg-info">{{ $list_existencia[0]['existencia'] }}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table id="tableExport" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Observaciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($inv as $row)
                              <tr class="row{{ $row->id_inventario }}">
                              <td>{{ $row->id_inventario }}</td>
                              <td>{{ $row->created_at }}</td>
                              <td>{{ $row->getpru->descripcion }}</td>
                              <td>{{ $row->cantidad }}</td>
                              <td>{{ $row->observacion }}</td>
                            <!--  <td>
                                 <div class="btn-group">

                                @can('Eliminar Permisos')
                                  <form action="{{ route('inventario.destroy', $row->id_inventario) }}" method="POST"
                                  style="display: inline-block;" onsubmit="return confirm('¿Desea eliminar?')">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-sm btn-danger" type="submit" >
                                   <i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                                title="Eliminar Registro."></i>
                                  </button>
                                </form>
                               @endcan
                               </div> 

                              </td>-->
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
      <!-- Add Permission Modal -->
      <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3>Ingresar Pruebas Covid</h3>
                <p>Coloque la Cantidad (Números) de Pruebas Covid a Registrar</p>
              </div>
              {!! Form::open(['route' => ['inventario.store'],'method' => 'POST']) !!}
                <div class="col-12 mb-3">
                  <label class="form-label" for="modalPermissionName">Cantidad de Pruebas</label>
                  <input type="text" name="cantidad" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Ingrese la Cantidad total de Puebas." autofocus required />
                </div>

                <div class="col-12 mb-3">
                 <label class="form-label" for="modalPermissionName">Tipo de Prueba</label>
                   {!! Form::select('id_tipo_prueba', $list_tipo_pr, null,array('class' => 'form-control','placeholder'=>'Selecione..')) !!}
                </div>

                <div class="col-12 mb-3">
                  <label class="form-label" for="modalPermissionName">Observación</label>
                  <input type="text" name="observacion" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Ingrese la Cantidad total de Puebas." autofocus required />
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
      <!--/ Add Permission Modal -->

@endsection
@push('scripts')
<script>
  $('#tableExport').DataTable({



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
         responsive:true,
         lengthChange: true,
         buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
  });

</script>
@endpush