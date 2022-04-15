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
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li>{{ $blog->title }}</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <div class="row gy-4">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="blog-container">
                        <h2 style="font-weight: 700">{{ $blog->title }}</h2>
                        <h3>{{ strlen($blog->description) > 80 ? substr($blog->description, 0, 80) . "..." : $blog->description }}</h3>
                      <p style="font-style: italic">Posted by {{ $blog->posted_by }} on {{ Utils::formatDate($blog->created_at) }}</p>
                      <hr>
                      <br>
                      {!! $blog->blog_content !!}
                    </div>
                </div>
            </div>
    
          </div>
        </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  
 @include('includes.footer')