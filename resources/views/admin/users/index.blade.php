  @include('admin.includes.header')

  @include('admin.includes.top-nav')

  @include('admin.includes.side-nav')

  <main id="main" class="main">

      <div class="pagetitle">
          <h1>Users</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Users</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->        
          
            <section>
              <div class="card">
                  <div class="card-body">
                      <div class="mt-3 mb-3">
                        
                        @include('includes.alerts')

                        <div>
                          <button type="button" id="btn-create" class="btn btn-sm btn-primary w-auto" data-bs-toggle="modal" data-bs-target="#userModal">
                              Create User
                          </button>
                        </div>

                        <div class="float-end">
                          <form action="{{route('searchUser')}}" method="get">
                            <div class="input-group mb-3">
                              <input type="text" name="key" class="form-control" placeholder="Search" aria-label="Search" required>
                              <button class="btn btn-outline-secondary" type="submit"><i class="bx bx-search"></i></button>
                            </div>
                          </form>
                        </div>
                      </div>
                      
                    <!-- Active Table -->
                    <table class="table table-borderless table-hover" id="users-table">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Access Level</th>
                          <th scope="col">Status</th>
                          <th scope="col">Created at</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($users))
                        @foreach ($users as $item)
                          <tr id="record-id-{{$item->id}}">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>@php
                                if ( $item->access_level == 1 ) {
                                    echo 'Admin';
                                }
                                else if ( $item->access_level == 2 ) {
                                    echo 'Support';
                                }
                            @endphp</td>
                            <td>@php
                                if ( $item->status == 1 ) {
                                    echo '<span class="badge rounded-pill bg-success">Active</span>';
                                }
                                else if ( $item->status == 0 ) {
                                    echo '<span class="badge rounded-pill bg-danger">Blocked</span>';
                                }
                            @endphp</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a class="btn btn-edit" data-info="{{ json_encode($item)}} "><i class="bx bx-edit"></i></a>
                                <a class="btn delete-record" data-id="{{ $item->id }}" object="users" data-bs-toggle="modal" data-bs-target="#delete-record-modal">
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
                     echo $users->links("pagination::bootstrap-4");
                    @endphp
                  </div>
                </div>
      
            </section>

  </main><!-- End #main -->

  @include('admin.users.modals')

  @include('admin.includes._vendor_scripts')

  @include('admin.includes._global_scripts')

  @include('admin.users.script')

  @include('admin.includes.footer')

