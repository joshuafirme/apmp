@include('admin.includes.header')

@include('admin.includes.top-nav')

@include('admin.includes.side-nav')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>About Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">About Page</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->        
        
          <section>
            <div class="card">
                <div class="card-body">
                    <div class="mt-3 mb-3">
                      
                      @include('includes.alerts')

                      @php
                          $about_cache = json_decode(Cache::get('about_cache'));
                          $is_image_exists = isset($about_cache->image) && strlen($about_cache->image) > 0 ? 1 : 0
                      @endphp

                    </div>
            
                    <form action="/manage-page/update-about" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-12">
                            <textarea class="tinymce-editor" name="about_content">
                              {{ isset($about_cache->about_content) ? $about_cache->about_content : "" }}
                            </textarea>
                          </div>
                          <div class="col-12 mt-3">
                            <label>{{ $is_image_exists == 1 ? "Update " : "" }}Cover Image</label>
                            <input class="form-control" type="file" name="image">
                          </div>
                          @if ($is_image_exists == 1)
                          <div class="col-12 mt-3">
                            <div class="mb-1">Image Preview</div>
                            <img width="300" src="{{ asset($about_cache->image) }}" alt="">
                          </div>
                          @endif
                          <div class="col-12 mt-3">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="show_image" 
                              {{ isset($about_cache->show_image) && $about_cache->show_image == 1 ? 'checked' : '' }}>
                              <label class="form-check-label">
                                Show Image
                              </label>
                            </div>
                          </div>
                        </div>
                        <button class="btn btn-sm btn-primary mt-3" type="submit">Save</button>
                    </form>

                </div>
              </div>
    
          </section>

</main><!-- End #main -->

@include('admin.role.modals')

@include('admin.includes._vendor_scripts')

@include('admin.includes.scripts.tinymce')

@include('admin.includes.footer')
