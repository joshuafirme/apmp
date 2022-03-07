  @include('admin.includes.header')

  @include('admin.includes.top-nav')

  @include('admin.includes.side-nav')

  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Subscriber</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Subscribers</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->        
          
            <section>
              <div class="card">
                  <div class="card-body">
                      <div class="mt-3 mb-3">
                        
                        @include('includes.alerts')
                        <div>
                          <button type="button" class="btn btn-sm btn-primary w-auto open-modal" data-bs-toggle="modal" data-bs-target="#sendMailModal">
                            Send Email <i class="ri-mail-send-line"></i>
                        </button>

                        <a class="btn btn-sm btn-success w-auto" href="{{ url('/subscriber/export-csv') }}" target="_blank">
                          Export CSV <i class="ri-file-excel-2-line" id="btn-export-csv"></i>
                        </a>
                        </div>
                        <div class="float-end">
                          <form action="{{route('searchSubscriber')}}" method="get">
                            <div class="input-group mb-3">
                              <input type="text" name="key" class="form-control" placeholder="Search" aria-label="Search" required>
                              <button class="btn btn-outline-secondary" type="submit"><i class="bx bx-search"></i></button>
                            </div>
                          </form>
                        </div>
                      </div>
                      
                    <!-- Active Table -->
                    <table class="table table-borderless table-hover" id="subscriber-table">
                      <thead>
                        <tr>
                          <th scope="col">Email</th>
                          <th scope="col">Status</th>
                          <th scope="col">Subscription Date</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($subscribers))
                        @foreach ($subscribers as $item)
                          <tr id="record-id-{{$item->id}}">
                            <td>{{ $item->email }}</td>
                            <td>@php
                                if ( $item->status == 1 ) {
                                    echo '<span class="badge rounded-pill bg-success">Verified</span>';
                                }
                                else if ( $item->status == 0 ) {
                                    echo '<span class="badge rounded-pill bg-danger">Unverified</span>';
                                }
                            @endphp</td>
                            <td>{{ Utils::formatDate($item->created_at) }}</td>
                             
                            <td>
                              <a class="btn delete-record" data-id="{{ $item->id }}" object="subscriber" data-bs-toggle="modal" data-bs-target="#delete-record-modal">
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
                     echo $subscribers->links("pagination::bootstrap-4");
                    @endphp
                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->

  @include('admin.subscriber.modals')

  @include('admin.includes._vendor_scripts')

  @include('admin.includes._global_scripts')

  @include('admin.subscriber.script')

  @include('admin.includes.footer')

