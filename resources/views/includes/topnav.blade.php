<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div id="logo">
        <h1><a href="{{ url('/') }}">Pamilya Muna <span>Party List</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            @php
                $header = json_decode(Cache::get('header_cache'));
            @endphp
          <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
          @if (isset($header->about) && $header->about == 'on')
          <li><a class="nav-link scrollto" href="{{url('/#about')}}">About</a></li>
          @endif
          @if (isset($header->advocacies) && $header->advocacies == 'on')
          <li><a class="nav-link scrollto" href="{{url('/#advocacies')}}">Advocacies</a></li>
          @endif
          @if (isset($header->projects) && $header->projects == 'on')
          <li><a class="nav-link scrollto " href="{{url('/#projects')}}">Projects</a></li>
          @endif
          @if (isset($header->events) && $header->events == 'on')
          <li><a class="nav-link scrollto " href="{{url('/#events')}}">Events</a></li>
          @endif
          @if (isset($header->news) && $header->news == 'on')
          <li><a class="nav-link scrollto " href="{{url('/#news')}}">News</a></li>
          @endif
          @if (isset($header->contact) && $header->contact == 'on')
          <li><a class="nav-link scrollto" href="{{url('/#contact')}}">Contact</a></li>
          @endif
          <li class="dropdown"><a href="#"><span>Others</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if (isset($header->gallery) && $header->gallery == 'on')
                  <li><a href="{{ url('/gallery') }}">Gallery</a></li>
              @endif
              @if (isset($header->blog) && $header->blog == 'on')
                  <li><a href="{{ url('/blog') }}">Blog</a></li>
              @endif
              @if (isset($header->downloads) && $header->downloads == 'on')
                  <li><a href="{{ url('/download') }}">Downloads</a></li>
              @endif
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->