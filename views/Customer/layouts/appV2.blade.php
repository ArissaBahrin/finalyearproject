<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TRAVEL AGENCY</title>

  <link rel="icon" href="img/favicon.png" type="image/png">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/magnefic-popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
  <header class="header_area">
    <div class="header-top">
      <div class="container">
        <div class="d-flex align-items-center">
          <div id="logo">
            <a href="{{route('home')}}"><img src="{{ asset('img/Logo k.png') }}" width="200" height="70" alt="" title="" /></a>
          </div>
          <div class="ml-auto d-none d-md-block d-md-flex">
            <div class="media header-top-info">
              <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
              <div class="media-body">
                <p>Have any question?</p>
                <p>Free: <a href="tel:+12 365 5233">+012 933 8462</a></p>
              </div>
            </div>
            <div class="media header-top-info">
              <span class="header-top-info__icon"><i class="ti-email"></i></span>
              <div class="media-body">
                <p>Have any question?</p>
                <p>Free: <a href="tel:+12 365 5233">+012 933 8462</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @yield('content')

  @include('Customer.layouts.footer')


  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('vendors/magnefic-popup/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('vendors/easing.min.js')}}"></script>
  <script src="{{ asset('vendors/superfish.min.js')}}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{ asset('vendors/mail-script.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
</body>
</html>