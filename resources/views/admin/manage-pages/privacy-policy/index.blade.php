@include('admin.includes.header')

@include('admin.includes.top-nav')

@include('admin.includes.side-nav')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Privacy Policy</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">Privacy Policy</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->        
        
          <section>
            <div class="card">
                <div class="card-body">
                    <div class="mt-3 mb-3">
                      
                      @include('includes.alerts')

                    </div>
            
                    <form action="/manage-page/update-privacy-policy" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-12">
                            <textarea id="rich_text_editor" name="privacy_policy">
                              {{ Cache::get('privacy_policy_cache') }}
                            </textarea>
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
