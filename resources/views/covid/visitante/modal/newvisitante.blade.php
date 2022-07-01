<div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Agregar nuevo Visitante</h3>
NUEVO
        </div>
        <form id="addNewCCForm" class="row g-3" onsubmit="return false">
            <div class="card-body">
              <form class="browser-default-validation">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-name">Cédula</label>
                  <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" required />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-name">Nombre</label>
                  <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" required />
                </div>
                  <div class="mb-3">
                  <label class="form-label" for="basic-default-name">Apellido</label>
                  <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" required />
                </div>

                <div class="mb-3">
                  <label class="form-label" for="basic-default-country">Tipo de Visita</label>
                  <select class="form-select" id="basic-default-country" required>
                    <option value="">Seleccione</option>
                    <option value="usa">ENTREVISTA LABORAL</option>
                    <option value="uk">DE CORTESÍA</option>
                    <option value="france">PRESENTACION</option>
                    <option value="australia">CEREMONIA</option>
                    <option value="spain">NEGOCIOS</option>
                  </select>
                </div>
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


                <div class="mb-3">
                  <label class="form-label" for="basic-default-bio">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3" required></textarea>
                </div>
                <div class="mb-3">

                </div>
                <div class="mb-3">

                </div>

                <div class="row">
                      <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">Guardar</button>
                          <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                      </div>
                </div>
              </form>
            </div>
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