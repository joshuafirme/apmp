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
              <h2>Blog</h2>
              <ol>
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li>Blog</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <div class="row gy-4">
    
              @foreach ($blog as $item)
              <div class="col-lg-8 col-md-10 mx-auto">
                <div class="blog-container">
                  <a style="color: #4A4A4A;" href="{{ url('/blog/read/'.$item->id) }}">
                    <h2 style="font-weight: 700">{{ $item->title }}</h2>
                    <h3>{{ strlen($item->description) > 80 ? substr($item->description, 0, 80) . "..." : $item->description }}</h3>
                  </a>
                  <p style="font-style: italic">Posted by Start Bootstrap on January 31, 2020</p>
                  <hr>
                </div>
              </div>
              @endforeach
    
            </div>
    
          </div>
        </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

 @include('includes.footer')