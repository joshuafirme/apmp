<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pamilya Muna - Party List</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/assets/css/coming_soon.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ComingSoon - v4.6.0
  * Template URL: https://bootstrapmade.com/comingsoon-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="">
    <div class="container d-flex flex-column align-items-center" style="margin-top: 150px">

      <h1>Our website is coming soon...</h1>
      <h2>We're working hard to create our website.</h2>

      <div class="subscribe" style="margin-bottom: 309px;">
        <h4>Subscribe now to get the latest updates!</h4>
        <form action="{{route('sendMail')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="subscribe-form">
            <input type="email" name="email"><input type="submit" value="Subscribe">
          </div>
          <div class="mt-2">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your notification request was sent. Thank you!</div>
          </div>
        </form>
        
        @include('includes.alerts')
      </div>

  <!--    <div class="social-links text-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    -->
    </div>
  </header><!-- End #header -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Pamilya Muna - Party List</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>