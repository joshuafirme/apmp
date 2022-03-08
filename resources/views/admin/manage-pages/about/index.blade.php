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

                    </div>
            
                    <form action="/manage-page/update-about" method="post">
                        @csrf
                        <textarea class="tinymce-editor" name="about_content">
                          {{ Cache::get('about_cache') }}
                        </textarea>
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
