@include('includes.header')

@include('includes.topnav')

@php
  $address = isset($contact->address) ? $contact->address : "";
  $email = isset($contact->email) ? $contact->email : "";
  $phone_number = isset($contact->phone_number) ? $contact->phone_number : "";
@endphp

  <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
          <div class="container mt-2">
    
            <div class="d-flex justify-content-between align-items-center">
              <h2>Downloads</h2>
              <ol>
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li>Downloads</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">File name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @if (count($downloads))
                @foreach ($downloads as $item)
                  <tr id="record-id-{{$item->id}}">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    @php
                        $file_name_arr = $item->file ? explode('/', $item->file) : [];
                        $file_name = $file_name_arr[count($file_name_arr)-1];
                    @endphp
                    <td><a class="btn btn-success rounded-pill" href="{{url('/download-file/'.$file_name)}}" target="_blank">Download</a></td>
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
    
          </div>
        </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

 @include('includes.footer')