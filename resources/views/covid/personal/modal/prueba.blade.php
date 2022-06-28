  <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="main-form" >
                 
                     <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <div class="row g-3">
                        
                        <!-- Range Picker-->
                        <div class="col-md-6 col-12 mb-2">
                          <label for="flatpickr-range" class="form-label">Rango de Duración</label>
                          <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" />
                        </div> 
                        <div class="col-xxl-12">
                            <div class="col-md">
                              <small class="text-light fw-semibold">Resultado de la Prueba</small>
                              <div class="form-check mt-3">
                                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1" />
                                <label class="form-check-label" for="defaultRadio1">
                                  Positivo
                                </label>
                              </div>
                              <div class="form-check">
                                <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2" checked />
                                <label class="form-check-label" for="defaultRadio2">
                                  Negativo
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div class="mb-3">
                              <label for="defaultInput" class="form-label">Observaciones</label>
                              <input id="defaultInput" class="form-control" type="text" placeholder="Observaciones" />
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

    var   newUserForm = $('#usuarios-form')


             // Form Validation
  if (newUserForm.length) {
        newUserForm.validate({
        errorClass: 'error',
        rules: {
          'tx_nombres': {
            required: true
          },
          'tx_apellidos': {
            required: true
          },
           'nb_usuario': {
            required: true
          },
           'password': {
            required: true
          },
           'tx_email': {
            required: true
          }
        }
    });

   
  }
        </script>
@endpush