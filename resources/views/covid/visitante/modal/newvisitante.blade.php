<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <!-- Vertically Centered Modal -->
      <div class="col-lg-4 col-md-6">
        <small class="text-light fw-semibold">Vertically centered</small>
        <div class="mt-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
            Launch modal
          </button>

          <!-- Modal -->
          <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameWithTitle" class="form-label">Name</label>
                      <input type="text" id="nameWithTitle" class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailWithTitle" class="form-label">Email</label>
                      <input type="text" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                      <label for="dobWithTitle" class="form-label">DOB</label>
                      <input type="text" id="dobWithTitle" class="form-control" placeholder="DD / MM / YY">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Visistante -->
      <div class="modal-dialog modal-centered modal-lg">
          <div class="modal-content ">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                   <form role="form" id="form_prueba" autocomplete="off">
                        <input type="hidden" id="_url" value="{{ url('user') }}">
                        <input type="hidden" id="_token" value="{{ csrf_token() }}">
                         <input type="hidden" id="id_personal" name="id_personal" value="">
                      <div class="row g-3">

                          <!-- Range Picker-->
                          <div class="col-md-6 col-12 mb-2">
                            <label for="flatpickr-range" class="form-label">Rango de Duración</label>
                            <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" name="flatpickr_range" />
                          </div>
                          <div class="col-xxl-12">
                              <div class="col-md">
                                <small class="text-light fw-semibold">Resultado de la Prueba</small>
                                <div class="form-check mt-3">
                                  <input name="default_radio_1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                                  <label class="form-check-label" for="defaultRadio1">
                                    Positivo
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input name="default_radio_1" class="form-check-input" type="radio" value="1" id="defaultRadio2" checked />
                                  <label class="form-check-label" for="defaultRadio2">
                                    Negativo
                                  </label>
                                </div>
                              </div>
                          </div>
                          <div class="col-xxl-12">
                              <div class="mb-3">
                                <label for="defaultInput" class="form-label">Observaciones</label>
                                <input id="observaciones" name="observaciones" class="form-control" type="text" placeholder="Observaciones" />
                              </div>
                          </div><!--end col-->
                          <div class="col-lg-12">
                              <div class="hstack gap-2 justify-content-end">

                                  <button type="submit" class="btn btn-primary float-right" id="boton">
                           <i class="float-left far fa-save text-white" id="ajax-icon"></i> <span class="text-white ml-1">{{ __('Guardar datos') }}</span>
                           </button>
                              </div>
                          </div><!--end col-->
                      </div><!--end row-->
                  </form>
              </div>
          </div>
      </div>
</div>
@push('scripts')
  <script>

    var   newUserForm = $('#form_prueba')


             // Form Validation
  if (newUserForm.length) {
        newUserForm.validate({
        errorClass: 'error',
        rules: {
          'Observaciones': {
            required: true
          },

           'flatpickr-range': {
            required: true
          }
        }
    });


  }
        </script>
@endpush