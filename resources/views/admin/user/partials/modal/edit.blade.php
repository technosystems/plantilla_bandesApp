
<div class="modal fade" id="ModulosEdit" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
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
                        <div class="col-xxl-6">
                            <div>
                                <label for="name" class="form-label">Nombres</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="tx_nombres" placeholder="Nombre del módulo"  id="nombreusuario" aria-describedby="register-name" tabindex="1" autofocus value="{{ old('name') }}" />
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Apellidos</label>
                                <input type="text" name="tx_apellidos" class="form-control" id="apellido" placeholder="Enter lastname">
                            </div>
                        </div><!--end col
                        <div class="col-lg-4">
                            <label for="genderInput" class="form-label">Gender</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Others</label>
                                </div>
                            </div>
                        </div>end col-->
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
                        <div class="col-xxl-12">
                            <div>
                                <label for="lastName" class="form-label">Usuario</label>
                                <input type="text" name="nb_usuario" class="form-control" id="usuario" placeholder="Enter lastname">
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <label for="emailInput" class="form-label">Correo electrónico</label>
                                <input type="email" name="tx_email" class="form-control" id="emailInput" placeholder="Enter your email">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="passwordInput" class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="passwordInput" >
                            </div>
                        </div>

                        <!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="passwordInput" class="form-label">Acceso al sistema</label>
                                <select name="nu_status" id="" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
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