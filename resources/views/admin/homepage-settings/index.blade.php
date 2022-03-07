  @include('admin.includes.header')

  @include('admin.includes.top-nav')

  @include('admin.includes.side-nav')

  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Home Page Settings</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Home Page Settings</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->        
          
            <section>
              <div class="card">
                  <div class="card-body">
                      <div class="mt-3 mb-3">
                        
                        @include('includes.alerts')

                        <div class="d-flex align-items-start">
                          <div class="nav flex-column nav-pills me-3"  style="width: 30%" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @php
                                $init_class = strlen(\Cache::get('hp_active_tab')) == 0 ? 'active show' : '';
                            @endphp
                            <div class="list-group text-center">
                              <button type="button" class="list-group-item list-group-item-action {{$init_class}}  {{ \Cache::get('hp_active_tab') == 'slider_banner' ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><small>Slider Banner</small></button>
                              <button type="button" class="list-group-item list-group-item-action {{ \Cache::get('hp_active_tab')=='slider' ? 'active' : ''}}" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><small>Slider</small></button>
                              <button type="button" class="list-group-item list-group-item-action {{ \Cache::get('hp_active_tab')=='visibility' ? 'active' : '' }}" id="v-pills-visibility-tab" data-bs-toggle="pill" data-bs-target="#v-pills-visibility" type="button" role="tab" aria-controls="v-pills-visibility" aria-selected="false"><small>Visibility</small></button>
                            </div>
                           
                          </div>
                          <div class="tab-content" style="width: 100%" id="v-pills-tabContent">
                            <div class="tab-pane fade {{$init_class}} {{ \Cache::get('hp_active_tab') == 'slider_banner' ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="container">
                                <button type="button" class="btn btn-sm btn-primary w-auto float-end" id="btn-add-slider-banner" modal-type="create" data-bs-toggle="modal" data-bs-target="#sliderBannerModal">
                                  Add <i class="bi bi-plus"></i>
                                </button>
                                <!-- Table -->
                                @include('admin.includes.tables.slider-banner')
                              </div>
                            </div>
                            <div class="tab-pane fade {{ \Cache::get('hp_active_tab') == 'slider' ? 'active show' : ''}}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              <div class="container">
                                <button type="button" class="btn btn-sm btn-primary w-auto float-end" id="btn-add-slider" modal-type="create" data-bs-toggle="modal" data-bs-target="#sliderModal">
                                  Add <i class="bi bi-plus"></i>
                                </button>
                                <!-- Table -->
                                @include('admin.includes.tables.slider')
                              </div>
                            </div>
                            <div class="tab-pane fade {{ \Cache::get('hp_active_tab') == 'visibility' ? 'active show' : ''}}" id="v-pills-visibility" role="tabpanel" aria-labelledby="v-pills-visibility-tab">
                              <div class="container">
                                ...
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->
  
  <!-- Modals -->
  @include('admin.includes.modals.slider-banner')
  @include('admin.includes.modals.slider')

   <!-- Global Scripts -->
  @include('admin.includes._vendor_scripts')
  @include('admin.includes._global_scripts')

  <!-- Page Scripts -->
  @include('admin.includes.scripts.slider-banner')
  @include('admin.includes.scripts.slider')

  @include('admin.includes.footer')
