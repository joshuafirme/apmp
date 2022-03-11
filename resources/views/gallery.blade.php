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
              <h2>Gallery</h2>
              <ol>
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li>Gallery</li>
              </ol>
            </div>
    
          </div>
        </section><!-- Breadcrumbs Section -->

        <section class="courses">
            <div class="container" data-aos="fade-up">
      
                  <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="row portfolio-container">
  
            @foreach ($gallery as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>{{ $item->title }}</h4>
                    <p>{{ $item->description }}</p>
                    <div class="portfolio-links">
                      <a href="{{ $item->image }}" data-gallery="portfolioGallery"
                        class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                      <a target="_blank" href="{{ $item->link }}" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->
      
            </div>
          </section>

  </main><!-- End #main -->

 @include('includes.footer')