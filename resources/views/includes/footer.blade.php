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
            <form action="/send-mail" method="post" role="form" id="form-news-letter">
              @csrf
              <input type="email" name="email"><input id="btn-send" type="submit" value="Subscribe">
            </form>
            <div class="my-3">
              <div class="error-msg"></div>
              <div class="sent-msg">Thank you, your subscription request was successful! Please check your email inbox to confirm.</div>
            </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/landing.js')}}"></script>

  <script>
    $(function(){
      if ($('#form-news-letter').length > 0) {
        $('#form-news-letter').submit(function() {
        let btn = $(this).find('#btn-send');
        btn.prop('disabled', true);
        btn.val('Please wait...');
        $('.sent-msg,.error-msg').css('display', 'none');

        $.ajax({
            type: 'POST',
            url: '/send-mail',
            data: $(this).serialize()
        })
        .done(function(data){
            console.log(data)
            if (data.status == 'success') {
              $('.sent-msg').css('display', 'block');
            }
            else if (data.status == 'email_exists') {
              $('.error-msg').css('display', 'block');
              $('.error-msg').text('Email is already exists in our system.')
            }
            else {
              $('.error-msg').css('display', 'block');
              $('.error-msg').text('Failed sending email, please try again.')
            }
            btn.prop('disabled', false);
            btn.val('Subscribe');
        })
        .fail(function() {
          btn.prop('disabled', false);
          btn.val('Subscribe');
          $('.error-msg').css('display', 'block');
          $('.error-msg').text('Failed sending email, please try again.')
        });

        return false;                       
        });
      }
    });
  </script>

</body>

</html>