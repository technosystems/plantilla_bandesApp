  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Registro de usuario</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form role="form" id="usuarios-form" autocomplete="off">
        <input type="hidden" id="_url" value="{{ url('user') }}">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Nombres</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="tx_nombres" aria-label="John Doe" />
          <span class="missing_alert text-danger" id="name_alert"></span>
        </div>
         <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Apellidos</label>
          <input type="text" class="form-control" id="add-user-last-name" placeholder="John Doe" name="tx_apellidos" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-username">Usuario</label>
          <input type="text" id="add-user-username" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="nb_usuario" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">Correo electrónico</label>
          <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="tx_email" />
        </div>
        <div class="mb-3">
          @php
            $roles = Spatie\Permission\Models\Role::get()
          @endphp
          <label class="form-label" for="user-role">Role del usuario</label>
          <select class="select2 form-select" name="role">
            <option value="">Seleccione el role</option>
            @foreach ($roles as $element)
              <option value="{{ $element->name }}">{{ $element->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-password">Contraseña</label>
          <input type="password" id="add-user-password" class="form-control" placeholder="*******" aria-label="john.doe@example.com" name="nb_password" />
        </div>
        <div class="mb-4">
          <label class="form-label" for="user-plan">Acceso al sistema</label>
         <div class="form-group mt-2">
            <div class="checkbox icheck">
              <label>
                <input class="form-check-input" type="radio" name="nu_status" value="1" checked> Activo&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="nu_status" value="0"> Deshabilitado
              </label>
            </div>
          </div>
        </div>
         <button type="submit" class="btn btn-primary ajax" id="submit">
          <i id="ajax-icon" class="far fa-save"></i> Ingresar
        </button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancelar</button>
      </form>
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
           'nb_password': {
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