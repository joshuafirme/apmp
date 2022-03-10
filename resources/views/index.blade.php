@include('includes.header')

@include('includes.topnav')

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        @foreach ($slider_banner as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url({{ asset($item->image) }})">
                <div class="carousel-container">
                <div class="container">
                    <h2 class="animate__animated animate__fadeInDown">{{ $item->title }}</h2>
                    <p class="animate__animated animate__fadeInUp">{{ $item->description }}</p>
                    <a href="{{ $item->link }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
                </div>
            </div>
        @endforeach

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          @php
              $show_image = isset($about->show_image) && $about->show_image ? $about->show_image : 0;
              $cover_img = isset($about->image) && strlen($about->image) > 0 ? $about->image : "";
          @endphp

          @if ($show_image == 1)

          <div class="col-lg-6 about-img">
            <img src="{{ asset($cover_img) }}" alt="">
          </div>

          @endif
          
          <div class="col-lg-{{ $show_image==1 ? '6' : '12' }} content">

            <h2>About Us</h2>

            {!! isset($about->about_content) ? $about->about_content : "" !!}

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Advocacies</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim
            export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export
            irure minim illum fore</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <div class="icon"><i class="bi bi-briefcase"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <div class="icon"><i class="bi bi-bar-chart"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <div class="icon"><i class="bi bi-binoculars"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="fade-up">
        <!-- <div class="section-header">
          <h2>Clients</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim
            export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export
            irure minim illum fore</p>
        </div>-->

        <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach ($slider as $item)
            <div class="swiper-slide" style="background-image: url({{ asset($item->image) }});"></div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <section class="posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Projects</h2>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($projects as $item)
            @php
                $title = $item->title ? $item->title : "";
                $link = $item->link ? $item->link : "";
                $description = $item->description && strlen($item->description) > 140 ? substr($item->description, 0, 140) . "..." : $item->description;
            @endphp
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="post-item">
                <img src="{{ asset($item->image) }}" class="img-fluid" alt="...">
                <div class="post-content">

                  <h3><a target="_blank" href="{{ $link }}">{{ $title }}</a></h3>
                  <p>{{ $description }}</p>
                </div>
              </div>
            </div> <!-- End post Item-->
          @endforeach

        </div>

      </div>
    </section>

        <!-- ======= Popular posts Section ======= -->
        <section id="popular-posts" class="posts">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>News</h2>
              <p>Latest News</p>
            </div>
    
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
    
              @foreach ($news as $item)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="post-item">
                  <img src="{{ asset($item->image) }}" class="img-fluid" alt="...">
                  <div class="post-content">
                    @php
                        $title = $item->title ? $item->title : "";
                        $link = $item->link ? $item->link : "";
                        $description = $item->description && strlen($item->description) > 240 ? substr($item->description, 0, 240) . "..." : $item->description;
                    @endphp
                    <h3><a href="post-details.html">{{ $title }}</a></h3>
                    <p>{{ $description }}</p>
                    <a target="_blank" href="{{ $link }}">Read more ></a>
                  </div>
                </div>
              </div> <!-- End post Item-->
              @endforeach
    
            </div>
    
          </div>
        </section><!-- End Popular posts Section -->

    

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Years of existence</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Scholars helped</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Financial aid recipients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
              class="purecounter"></span>
            <p>Bills authored/co-authored</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container mt-3" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact Us</h2>
        </div>

        <div class="row contact-info">

          @php
              $address = isset($contact->address) ? $contact->address : "";
              $email = isset($contact->email) ? $contact->email : "";
              $phone_number = isset($contact->phone_number) ? $contact->phone_number : "";
          @endphp

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>{{ $address }}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">{{ $phone_number }}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:{{ $email }}">{{ $email }}</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container">
        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>

            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>

            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 @include('includes.footer')