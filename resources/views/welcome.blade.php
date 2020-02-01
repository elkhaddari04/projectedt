<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool &mdash; ESt SB </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="homepage/fonts/icomoon/style.css">

    <link rel="stylesheet" href="homepage/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage/css/jquery-ui.css">
    <link rel="stylesheet" href="homepage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="homepage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="homepage/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="homepage/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="homepage/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="homepage/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="homepage/css/aos.css">

    <link rel="stylesheet" href="homepage/css/style.css">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>




    <div class="intro-section" id="home-section">

      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 ">
              <div class="row justify-content-center">


                <div class="col-lg-7  " data-aos="fade-up" data-aos-delay="500">
                                <form method="POST" action="{{ route('login') }}" class="form-box">

                                @csrf

                    <h3 class="h4 text-black mb-4">Login</h3>


                    @csrf

                    <div class="form-group ">

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group ">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                    </div>

                    <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-pill btn-block">
                                {{ __('Login') }}
                            </button>


                    </div>






                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>







  </div> <!-- .site-wrap -->

  <script src="homepage/js/jquery-3.3.1.min.js"></script>
  <script src="homepage/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="homepage/js/jquery-ui.js"></script>
  <script src="homepage/js/popper.min.js"></script>
  <script src="homepage/js/bootstrap.min.js"></script>
  <script src="homepage/js/owl.carousel.min.js"></script>
  <script src="homepage/js/jquery.stellar.min.js"></script>
  <script src="homepage/js/jquery.countdown.min.js"></script>
  <script src="homepage/js/bootstrap-datepicker.min.js"></script>
  <script src="homepage/js/jquery.easing.1.3.js"></script>
  <script src="homepage/js/aos.js"></script>
  <script src="homepage/js/jquery.fancybox.min.js"></script>
  <script src="homepage/js/jquery.sticky.js"></script>


  <script src="homepage/js/main.js"></script>

  </body>
</html>
