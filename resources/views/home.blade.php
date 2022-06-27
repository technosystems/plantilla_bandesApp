@extends('layouts.app')

@section('content')

   <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Sistema para la Recepción y Control de Pruebas Covid</h5>
                          <p class="mb-4">Sistema <span class="fw-bold">BANDES</span> para la Recepción, Inventario y Control de Pruebas Covid para el Personal y Visitantes.</p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="../../assets/img/illustrations/logo_home2.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.html">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
 <!-- / reporte-->
                <div class="col-md-12 col-lg-2">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex align-items-end row">
                          <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                            <div class="card-title">
                              <h5 class="text-nowrap mb-3">Existencia</h5>
                             
                            </div>
                            <div class="mt-sm-auto">
                              <small class="text-success text-nowrap fw-semibold"><i class='bx bx-chevron-up'></i> 68.2%</small>
                              <h3 class="mb-0">23</h3>
                            </div>
                          </div>
                          <div id="profileReportChart"></div>
                        </div>
                      </div>
                    </div>
                </div>


                <!-- / modulos -->
                  <div class="col-md-12 col-lg-4">
                    <div class="row">
                      <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="card-body pb-0 px-0 px-md-0">
                          <img src="../../assets/img/illustrations/acompanamiento-empleados.png" height="80" alt="View Badge User" data-app-dark-img="illustrations/acompanamiento-empleados.png" data-app-light-img="illustrations/acompanamiento-empleados.html">
                        </div>
                              <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt6">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div>
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Empleados</h4>
                              <a href="https://plantilla_bandesApp/resources/views/covid/personal.html" class="text-success fw-semibold">
                                <div data-i18n="Ver mas">Ver mas</div>
                              </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="card-body pb-0 px-0 px-md-0">
                          <img src="../../assets/img/illustrations/visitante.png" height="80" alt="View Badge User" data-app-dark-img="illustrations/visitante.png" data-app-light-img="illustrations/visitante.html">
                        </div>
                              <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt6">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div>
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Visitantes</h4>
                             <a href="https://plantilla_bandesApp/resources/views/covid/personal.html" class="text-success fw-semibold">
                                <div data-i18n="Ver mas">Ver mas</div>
                              </a>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="col-md-12 col-lg-4">
                    <div class="row">
                       <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">

                                <div class="card-body pb-0 px-0 px-md-0">
                                     <img src="../../assets/img/illustrations/inventario.jpg" height="80"  width="140" data-app-dark-img="illustrations/inventario.jpg" data-app-light-img="illustrations/inventario.html">
                                </div>

                              <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt6">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div>
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Inventario</h4>
                            <small class="text-success fw-semibold"><i class=''></i>Ver mas</small>
                          </div>
                        </div>
                      </div>
                       <div class="col-lg-6 col-md-3 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="card-body pb-0 px-0 px-md-0">
                          <img src="../../assets/img/illustrations/consultar.png" height="80"  width="100" alt="View Badge User" data-app-dark-img="illustrations/consultar.png" data-app-light-img="illustrations/consultar.html">
                        </div>
                              <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt6">
                                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                              </div>
                            </div>
                            <span class="d-block"></span>
                            <h4 class="card-title mb-1" color="white">Consulta</h4>
                            <small class="text-success fw-semibold"><i class=''></i>Ver mas</small>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                <!-- / modulos -->
              </div>
          </div>
          <!-- / Content -->


                <!-- Footer
                <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">

                     Realizado por <a href="https://themeselection.com/" target="_blank" class="footer-link fw-bolder">Gerencia de Tecnología y Sistemas de Información</a>
                    </div>
                    <div>



                      <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentación</a>


                      <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Soporte</a>

                    </div>
                  </div>
                </footer>
                <!-- / Footer -->


          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
            <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

  </div>




@endsection
