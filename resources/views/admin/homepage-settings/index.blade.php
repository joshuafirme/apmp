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
                              <button type="button" class="list-group-item list-group-item-action {{$init_class}}  {{ \Cache::get('hp_active_tab') == 'cover_photo' ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><small>Main Cover Photo</small></button>
                              <button type="button" class="list-group-item list-group-item-action {{ \Cache::get('hp_active_tab')=='contact' ? 'active' : ''}}" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><small>Stats</small></button>
                              <button type="button" class="list-group-item list-group-item-action {{ \Cache::get('hp_active_tab')=='logo' ? 'active' : '' }}" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><small>Slider</small></button>
                            </div>
                           
                          </div>
                          <div class="tab-content" style="width: 100%" id="v-pills-tabContent">
                            <div class="tab-pane fade {{$init_class}} {{ \Cache::get('hp_active_tab') == 'cover_photo' ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="container">
                                <form action="/manage-site/homepage-settings/update-cover" method="post" enctype="multipart/form-data" class="row g-3">
                                  @csrf
                                    <div class="col-md-12">
                                      <label for="formFile" class="form-label">Main Cover Photo</label>
                                      <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="col-md-12">
                                      <img src="{{asset(Cache::get('cover_photo_cache'))}}" width="100%" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-md-12">
                                      <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                            <div class="tab-pane fade {{ \Cache::get('hp_active_tab') == 'contact' ? 'active show' : ''}}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              <div class="container">
                                <form action="/manage-site/general-settings/update-contact-and-footer" method="post" class="row g-3">
                                  @csrf
                                    <div class="col-md-12">
                                      <label for="validationCustom01" class="form-label">Address</label>
                                      <input type="text" class="form-control" name="address" value="{{ $setting::getAddress() }}" required>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="validationCustom02" class="form-label">Phone Number</label>
                                      <input type="text" class="form-control" name="phone_number" value="{{ $setting::getPhone() }}" required>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="validationCustom02" class="form-label">Email</label>
                                      <input type="text" class="form-control" name="email" value="{{ $setting::getEmail() }}" required>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="validationCustom02" class="form-label">Copy right</label>
                                      <textarea rows="3" class="form-control" name="copyright" required>{{ $setting::getCopyright() }}</textarea>
                                    </div>
                                    <div class="col-md-12">
                                      <button class="btn btn-sm btn-primary" type="submit">Save</button>
                    
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->


  @include('admin.includes._vendor_scripts')

  @include('admin.includes.footer')

