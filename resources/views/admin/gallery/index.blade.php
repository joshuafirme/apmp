  @include('admin.includes.header')

  @include('admin.includes.top-nav')

  @include('admin.includes.side-nav')
  
  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Gallery</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Gallery</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->        
          
            <section>
              @php
                  $use_fb_photos = isset($gllr_settings->use_fb_photos) ? $gllr_settings->use_fb_photos : 0;
                  $posts_limit = isset($gllr_settings->posts_limit) ? $gllr_settings->posts_limit : 10;
              @endphp

              
              @include('includes.alerts')

            <div class="card">
              <div class="card-body">
                <form action="/update-gallery-settings" method="post" id="form-gallery-setting" class="mt-4 p-3">
                  @csrf
                  <div class="form-check form-switch w-25">
                    <input class="form-check-input" type="checkbox" name="use_fb_photos" 
                    {{ $use_fb_photos == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Use Facebook Photos</label>
                  </div>
                  
                @if ($use_fb_photos == 1)
                  <div class="mt-3">
                    <label for="validationCustom01" class="form-label">Photos Limit</label>
                    <input type="text" class="form-control w-25" name="posts_limit" value="{{ $posts_limit }}" required>
                  </div>
                @endif

                  <button type="submit" class="btn btn-sm btn-primary w-auto mt-3">Save</button>
                </form> 
  
              </div>
            </div>

            @if ($use_fb_photos == 1)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Get Facebook album photos</h5>
    
                  <!-- Horizontal Form -->
                  <form method="post" action="#" id="form-get-fb-photos">
                    @csrf
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook Album ID</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="album_id" required>
                      </div>
                    </div>
                    <div class="text-center">
                      
                    <button type="submit" class="btn btn-sm btn-primary w-auto btn-get-photos">
                      Sync Photos <i class="bx bx-sync"></i>
                    </button>
                    </div>
                  </form><!-- End Horizontal Form -->
    
                </div>
              </div>
            @endif
              
              <div class="card">
                  <div class="card-body">
                      <div class="mt-3 mb-3">

                        @if ($use_fb_photos != 1)
                        <div>
                          <button type="button" id="btn-create" class="btn btn-sm btn-primary w-auto open-modal" modal-type="create">
                            Add <i class="bi bi-plus"></i>
                        </button>
                        </div>
                        @endif

                      </div>
                      
                    <!-- Active Table -->
                    @if ($use_fb_photos == 1)
                      <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Link</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (count($fb_photos))
                          @foreach ($fb_photos as $item)
                            <tr>
                              <td><div class='photo-thumb' style='background: url({{ $item['source'] }}) 50% 50% no-repeat; background-size:cover;'></div></td>
                              <td>{{ isset($item['name']) ? $item['name'] : "" }}</td>
                              <td>{{ isset($item['description']) ? $item['description'] : "" }}</td>
                              <td><a target="_blank" href="{{ isset($item['link']) ? $item['link'] : "" }}">{{ isset($item['link']) ? $item['link'] : "" }}</a></td>
                            </tr> 
                          @endforeach
                          @else
                          <tr>
                            <td colspan="6">
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                No data found.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            </td>
                          </tr>
                          @endif

                        </tbody>
                      </table>

                      @else

                        <table class="table table-borderless table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Image</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Link</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (count($gallery))
                            @foreach ($gallery as $item)
                              <tr id="record-id-{{$item->id}}">
                                <td><img width="200px" src="{{ asset($item->image) }}" alt=""></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td><a target="_blank" href="{{ $item->link }}">{{ $item->link }}</a></td>
                                <td>
                                  <a class="btn btn-edit open-modal" modal-type="update" data-info="{{ json_encode($item)}} "><i class="bx bx-edit"></i></a>
                                  <a class="btn delete-record" data-id="{{ $item->id }}" object="manage-site/gallery" data-bs-toggle="modal" data-bs-target="#delete-record-modal">
                                    <i class="bx bx-trash" style="color: red;"></i>
                                  </a>
                                </td>
                              </tr> 
                            @endforeach
                            @else
                            <tr>
                              <td colspan="6">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  No data found.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                              </td>
                            </tr>
                            @endif

                          </tbody>
                        </table>
                        <!-- End Tables without borders -->

                        @php
                        echo $gallery->links("pagination::bootstrap-4");
                        @endphp
                        
                      @endif

                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->

  @include('admin.gallery.modals')

  @include('admin.includes._vendor_scripts')

  @include('admin.includes._global_scripts')

  @include('admin.gallery.script')

  @include('admin.includes.footer')

