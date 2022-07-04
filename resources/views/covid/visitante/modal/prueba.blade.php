<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content ">
aqui
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!--<form id="main-form">-->
                <form role="form" id="form_prueba" autocomplete="off">

                    <input type="hidden" id="_url" value="{{ url('user') }}">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="id_personal" name="id_personal" value="">

                    <div class="row g-3">

                        <!-- Range Picker-->
                        <div class="col-md-6 col-12 mb-2">
                          <label for="flatpickr-range" class="form-label">Rango de Duración:</label>
                          <input type="text" class="form-control" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" name="flatpickr_range" />
                        </div>

                        <div class="col-xxl-12">
                            <div class="col-md">
                              <small class="form-label">Resultado de la Prueba:</small>
                              <div class="form-check mt-3">
                                <input name="default-radio-1" class="form-check-input" type="radio" value="2" id="defaultRadio1" />
                                <label class="form-check-label" for="defaultRadio1">
                                  Positivo
                                </label>
                              </div>
                              <div class="form-check">
                                <input name="default-radio-1" class="form-check-input" type="radio" value="1" id="defaultRadio2" checked />
                                <label class="form-check-label" for="defaultRadio2">
                                  Negativo
                                </label>
                              </div>
                            </div>
                        </div>

                        <div class="col-xxl-12">
                            <!--
                                <div class="col-12">
                                <label class="form-label" for="bootstrap-maxlength-example2">Observaciones:</label>
                                <textarea id="defaultInput" class="form-control bootstrap-maxlength-example" rows="2" maxlength="250"></textarea>
                                </div>
                            -->
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

                    </div><!--row g-3-->

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