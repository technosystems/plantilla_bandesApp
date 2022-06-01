@extends('layouts.app')
@section('title','Permisos')
@section('page_title', 'Listado de Permisos')
@section('content')
<div class="page-content">
    <div class="container-fluid">

  <div class="row">
   
      <div class="col-lg-12">
            <div class="card card-line-primary">
                <div class="card-header">
                  <p>Listado de permisos</p>
                </div>
                  <div class="card-body">
                    <button class="dt-button add-new btn btn-primary mb-md-0" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><span>Agregar permiso</span></button>
                    <div class="table-responsive">
                      <table id="tableExport" class="display table table-striped table-hover" >
                        <thead>
                          <tr>
                           <th>#</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($permissions as $element)
                              <tr class="row{{ $element->id }}">
                              <td>{{ $element->id }}</td>
                              <td>{{ $element->name }}</td>
                              <td>
                               <div class="btn-group">
                                  @can('Editar Permisos')
                                  <button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#myModal{{ $element->id }}"><i class="mdi mdi-pencil mt-2 text-white" data-toggle="tooltip" data-placement="top"
                                title="Editar Permiso."></i></button>
                                 @endcan
                                @can('Eliminar Permisos')
                                  <form action="{{ route('permisos.destroy', $element->id) }}" method="POST"
                                  style="display: inline-block;" onsubmit="return confirm('¿Desea eliminar?')">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-sm btn-danger" type="submit" >
                                   <i class="mdi mdi-delete mt-2 text-white" data-toggle="tooltip" data-placement="top"
                                title="Eliminar Permiso."></i>
                                  </button>
                                </form>
                               @endcan
                               </div>
                                 
                              </td>
                              </tr>
                                @include('admin.permission.partials.modal.edit')

                              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        @include('admin.permission.partials.modal.create')
      </div>
      <!-- Add Permission Modal -->
      <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3>Nuevo permiso</h3>
                <p>Permisos que puede usar y asignar a sus usuarios.</p>
              </div>
              {!! Form::open(['route' => ['permisos.store'],'method' => 'POST']) !!}
                <div class="col-12 mb-3">
                  <label class="form-label" for="modalPermissionName">Nombre del permiso</label>
                  <input type="text" name="name" id="modalPermissionName" name="modalPermissionName" class="form-control" placeholder="Intrese el nombre del permiso." autofocus required />
                </div>
               
                <div class="col-12 text-center demo-vertical-spacing">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                  <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Discard</button>
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