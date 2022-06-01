 <!-- Add Permission Modal -->
      <div class="modal fade" id="myModal{{ $element->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3>Editar permiso</h3>
               <b>Edite el permiso según sus requisitos.<b>
              </div>
              {!! Form::model($element, ['route' => ['permisos.update',$element->id],'method' => 'PUT']) !!}
               <div class="alert alert-warning" role="alert">
                  <h6 class="alert-heading fw-bold mb-2">Ten cuidado!</h6>
                  <p class="mb-0">Al editar el nombre del permiso, es posible que rompa la funcionalidad de los permisos del sistema. Asegúrese de estar absolutamente seguro antes de continuar.</p>
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label" for="modalPermissionName">Nombre del permiso</label>
                   {!! Form::text('name',null,['class'=>'form-control','autocomplete' =>'off','placeholder' =>'Nombre del permiso']) !!}
                </div>
               
                <div class="col-12 text-center demo-vertical-spacing">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Editar</button>
                  <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Discard</button>
                </div>
               {!! Form::close()!!}
            </div>
          </div>
        </div>
      </div>
      <!--/ Add Permission Modal -->