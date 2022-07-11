  <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog modal-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <form action="{{ route('pdfmov') }}" method="POST" target="_blank " style="display: inline-block;">
                              @csrf
                      <input type="hidden" id="_url" value="{{ url('user') }}">
                      <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <div class="row g-3">
                        
                         <!-- Date Picker-->
                          <div class="col-md-6 col-12 mb-4">
                            <label for="flatpickr-date" class="form-label">Desde</label>
                            <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="desde_prb" name="desde_prb" />
                          </div>
                          <!-- /Date Picker -->

                          <!-- Date Picker-->
                          <div class="col-md-6 col-12 mb-4">
                            <label for="flatpickr-date" class="form-label">Hasta</label>
                            <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="hasta_prb" name="hasta_prb" />
                          </div>
                          <!-- /Date Picker -->
                        
                       
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

 
  </script>
@endpush