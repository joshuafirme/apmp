 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Pamilya Muna - Party List</h3>
              <p>
                {{ $address }}<br><br>
                <strong>Phone:</strong> {{ $phone_number }}<br>
                <strong>Email:</strong> {{ $email }}<br>
              </p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/blog') }}">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#news">News</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#news">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#news">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/privacy-policy') }}">Privacy policy</a></li>
            </ul>
          </div>


          <div class="col-lg-5 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter to receive updates via email</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        {!! isset($contact->copyright) ? $contact->copyright : "" !!}
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/landing.js')}}"></script>

</body>

</html>