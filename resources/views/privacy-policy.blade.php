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
              <h2>Privacy Policy</h2>
              <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Privacy Policy</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <section id="portfolio-details" class="portfolio-details">
          <div class="container">
    
            <div class="row gy-4">
    
              <div class="col-lg-8 col-md-10 mx-auto">
                {!! Cache::get('privacy_policy_cache') !!}
              </div>
    
            </div>
    
          </div>
        </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

 @include('includes.footer')