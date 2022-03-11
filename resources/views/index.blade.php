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
              $show_media = isset($about->show_media) && $about->show_media ? $about->show_media : 0;
              $media = isset($about->media) && strlen($about->media) > 0 ? $about->media : "";
          @endphp

          @if ($show_media == 1)

          <div class="col-lg-6 about-img">

            @if (strpos($media, 'mp4') !== false)
                <video width="100%" height="450" autoplay="autoplay" muted controls>
                  <source src="{{ asset($media) }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
            @else
              <img src="{{ asset($media) }}" width="100%" alt="">
            @endif

          </div>

          @endif
          
          <div class="col-lg-{{ $show_media==1 ? '6' : '12' }} content">

            <h2>About Us</h2>

            {!! isset($about->about_content) ? $about->about_content : "" !!}

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= advocacies section ======= -->
    <section id="advocacies">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Advocacies</h2>
        </div>

        <div class="row gy-4">

          @foreach ($advocacies as $item)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="box">
                <h4 class="title">{{ $item->title }}</h4>
                <p class="description">{{ $item->description }}</p>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    
    <section id="projects" class="posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Projects</h2>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($projects as $item)
            @php
                $title = $item->title ? $item->title : "";
                $link = $item->link ? $item->link : "";
                $description = $item->description && strlen($item->description) > 440 ? substr($item->description, 0, 440) . "..." : $item->description;
            @endphp
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="post-item">
                <img src="{{ asset($item->image) }}" style="width:100%; max-height: 310px; object-fit: cover;" alt="...">
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


    <section id="events" class="posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Events</h2>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          @foreach ($events as $item)
            @php
                $title = $item->title ? $item->title : "";
                $link = $item->link ? $item->link : "";
                $description = $item->description && strlen($item->description) > 440 ? substr($item->description, 0, 440) . "..." : $item->description;
            @endphp
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="post-item">
                <img src="{{ asset($item->image) }}" style="width:100%; max-height: 310px; object-fit: cover;" alt="...">
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
        <section id="news" class="posts">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>News</h2>
              <p>Latest News</p>
            </div>
    
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
    
              @foreach ($news as $item)
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="post-item">
                  <img src="{{ asset($item->image) }}" style="width:100%; max-height: 310px; object-fit: cover;" alt="...">
                  <div class="post-content">
                    @php
                        $title = $item->title ? $item->title : "";
                        $link = $item->link ? $item->link : "";
                        $description = $item->description && strlen($item->description) > 240 ? substr($item->description, 0, 240) . "..." : $item->description;
                    @endphp
                    <h3><a href="{{ $link }}">{{ $title }}</a></h3>
                    <p>{{ $description }}</p>
                    <a target="_blank" href="{{ $link }}">Read more ></a>
                  </div>
                </div>
              </div> <!-- End post Item-->
              @endforeach
    
            </div>
    
          </div>
        </section><!-- End Popular posts Section -->


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
          <form action="/contact-us/send" method="post" role="form" class="php-email-form" id="form-contact">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(function() {

     $('video').on('ended', function () {
       this.load();
       this.play();
     });

     $('#form-contact').submit(function() {
        let btn = $(this).find('button');
        btn.prop('disabled', true);
        btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('.sent-message,.error-message').css('display', 'none');

        $.ajax({
            type: 'POST',
            url: '/contact-us-send',
            data: $(this).serialize()
        })
        .done(function(data){
            console.log(data)
            if (data.status == 'success') {
              $('.sent-message').css('display', 'block')
            }
            else {
              $('.error-message').css('display', 'block');
              $('.error-message').text('Failed sending email, please try again.')
            }
            btn.css('display', 'none');
        })
        .fail(function() {
          btn.prop('disabled', false);
          btn.html('<i class="bi bi-telegram"></i> Send');
          $('.error-message').css('display', 'block');
          $('.error-message').text('Failed sending email, please try again.')
        });

        return false;                       
        });
    });
  </script>

 @include('includes.footer')