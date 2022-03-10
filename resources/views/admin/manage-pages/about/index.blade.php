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
                          $is_media_exists = isset($about_cache->media) && strlen($about_cache->media) > 0 ? 1 : 0
                      @endphp

                    </div>
            
                    <form action="/manage-page/update-about" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-12">
                            <textarea id="rich_text_editor" name="about_content">
                              {{ isset($about_cache->about_content) ? $about_cache->about_content : "" }}
                            </textarea>
                          </div>
                          <div class="col-12 mt-3">
                            <label>{{ $is_media_exists == 1 ? "Update " : "" }} Media</label>
                            <input class="form-control" type="file" name="image">
                          </div>
                          @if ($is_media_exists == 1)
                          <div class="col-5 mt-3">
                            <div class="mb-1">Media Preview</div>
                            @if (strpos($about_cache->media, 'mp4') !== false)
                            <video width="100%" height="450" controls>
                              <source src="{{ asset($about_cache->media) }}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                        @else
                          <img src="{{ asset($about_cache->media) }}" width="100%" alt="">
                        @endif
                          </div>
                          @endif
                          <div class="col-12 mt-3">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="show_media" 
                              {{ isset($about_cache->show_media) && $about_cache->show_media == 1 ? 'checked' : '' }}>
                              <label class="form-check-label">
                                Show media
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

@include('admin.includes.footer')
