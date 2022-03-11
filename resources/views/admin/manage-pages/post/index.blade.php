  @include('admin.includes.header')

  @include('admin.includes.top-nav')

  @include('admin.includes.side-nav')

  <main id="main" class="main">

      <div class="pagetitle">
          <h1>{{ $post_text }}</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">{{ $post_text }}</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->        
          
            <section>
              <div class="card">
                  <div class="card-body">
                      <div class="mt-3 mb-3">
                        
                        @include('includes.alerts')

                        <div>
                          <button type="button" id="btn-create" class="btn btn-sm btn-primary w-auto open-modal" 
                          post-text="{{ $post_text }}" category="{{ $category }}" modal-type="create">
                              Add <i class="bi bi-plus"></i>
                          </button>
                        </div>
                      </div>
                      
                    <!-- Active Table -->
                    <table class="table table-borderless table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Link</th>
                          @if ($category != 'advocacy')
                          <th scope="col">Image</th>
                          <th scope="col">Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($posts))
                        @foreach ($posts as $item)
                          <tr id="record-id-{{$item->id}}">
                            <td>{{ $item->title }}</td>
                            <td width="40%">{{ $item->description }}</td>
                            @if ($category != 'advocacy')
                            <td><a target="_blank" href="{{ $item->link }}">{{ $item->link }}</a></td>
                            <td><div class='photo-thumb' style='background: url({{ asset($item->image) }}) 50% 50% no-repeat; background-size:cover;'></div></td>
                            @endif
                            <td>
                              <a class="btn btn-edit open-modal" post-text="{{ $post_text }}" category="{{ $category }}" modal-type="update" data-info="{{ json_encode($item)}} "><i class="bx bx-edit"></i></a>
                                <a class="btn delete-record" post-text="{{ $post_text }}" category="{{ $category }}" data-id="{{ $item->id }}" object="post" data-bs-toggle="modal" data-bs-target="#delete-record-modal">
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
                     echo $posts->links("pagination::bootstrap-4");
                    @endphp
                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->

  @include('admin.manage-pages.post.modals')

  @include('admin.includes._vendor_scripts')

  @include('admin.includes._global_scripts')

  @include('admin.manage-pages.post.script')

  @include('admin.includes.footer')

