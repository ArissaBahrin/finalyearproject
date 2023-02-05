@extends('Customer.layouts.appV2')
@section('content')
	<!-- ================ header section start ================= -->	
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav">
              <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('package.index')}}">Tour Destination</a></li>
              @guest
              <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            @endguest
            @auth
              @if (!Auth::user()->is_admin)
                <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
              @endif
            @endauth
              @auth
                @if (Auth::user()->is_admin)
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">Manage</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a class="nav-link" href="{{route('package.create')}}">Add Package</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('package.list')}}">All Packages</a></li>
                    </ul>
                  </li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="{{route('booking.list')}}">History</a></li>
              @endauth
            </ul>
          </div>

          <ul class="navbar-nav ms-auto">
            @guest
                  @if (Route::has('login'))
                      <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Login</a>
                        <ul class="dropdown-menu">
                          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Customer </a></li>
                          <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">Admin </a></li>
                        </ul>
                      </li>
                  @endif
  
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  {{-- <li>
                    <form action="{{ route('logout') }}" method="POST" class="m-auto">
                      @csrf
                        <button type="submit" class="button-logout">{{Auth::user()->name}} - Log Out</button>
                    </form>
                  </li> --}}
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a class="nav-link" href="{{route('profile', ['user'=>Auth::user()->id])}}">Profile</a></li>
                      <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="m-auto">
                          @csrf
                            <button type="submit" class="button-logout">Log Out</button>
                        </form>
                      </li>
                    </ul>
                  </li>
              @endguest
          </ul>
        </div>
      </nav>
    </div>
	</header>
	<!-- ================ header section end ================= -->	

  <main class="site-main">
    

    <!-- ================ start banner area ================= --> 
    <section class="home-banner-area" id="home">
      <div class="container h-100">
        <div class="home-banner">
          <div class="text-center">
            <h4>See What a Difference a stay makes</h4>
            <h1>KIRANA <em>HOLIDAYS</em></h1>
            <a class="button home-banner-btn" href="{{route('package.index')}} ">Book Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!-- ================ welcome section start ================= --> 
    <section class="welcome">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="row no-gutters welcome-images">
              <div class="col-sm-7">
                <div class="card">
                  <img class="" src="{{asset('img/p7.jpg')}}" alt="Card image cap">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="card">
                  <img class="" src="{{asset('img/p12.jpg')}}" alt="Card image cap">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <img class="" src="{{asset('img/p8.jpg')}}" alt="Card image cap">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="welcome-content">
              <h2 class="mb-4"><span class="d-block">Welcome</span> to Kirana Holidays</h2>
              <p align="justify"> Kirana Holidays Sdn Bhd starting as a family business. It was founded in April 2002 and has since evolved to  become one of Malaysia's best travel agency companies. </p>
              <p align="justify">Mr. Zam Zam bin  Kasim is a Malay manager that saw an opportunity to start the Kirana Holidays  agency in Merlimau, Melaka, which offers a variety of travel packages and services to valued travelers. </p>
              <p align="justify">These companies assist prospective clients by making hotel bookings, transportation, food supplies, and flight arrangements.</p>
              <a class="button button--active home-banner-btn mt-4" href="{{ route('about')}}">Discover More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ welcome section end ================= --> 

     <br><br><br><br> 
              
    <!-- ================ Explore section start ================= -->
    {{-- <section class="section-margin"> --}}
      <div class="container">
        <div class="section-intro text-center pb-80px">
          <div class="section-intro__style">
            <img src="{{asset('img/p23.png')}}" width="80" height="80" alt="">
          </div>
          <h2> Our Top Packages</h2>
        </div>

        <div class="row">
        @foreach ($packages as $package)
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
          <div class="card card-explore">
            <div class="card-explore__img">
                <img class="card-img" src="{{asset('storage/'.$package->thumbnail_path)}}" alt="">
            </div>
            <div class="card-body">
                <h3 class="card-explore__price">RM{{$package->adult_price}} <sub>/ Adult</sub></h3>
                <h3 class="card-explore__price">RM{{$package->children_price}} <sub>/ Child</sub></h3>
                <h4 class="card-explore__title"><a href="#">{{$package->name}} ({{$package->days}}D{{$package->nights}}N)</a></h4>
                <p>{{$package->country}}</p>
                @guest
                  @if ($package->limit == 0)
                    {{-- <a class="card-explore__link" href="#" @disabled(true)>Not Available<i class="ti-arrow-right"></i></a> --}}
                    <strong>NOT AVAILABLE</strong>
                  @else
                    <a class="card-explore__link" href="{{route('booking.form', ['package'=>$package->id])}}">Book Now <i class="ti-arrow-right"></i></a>
                  @endif
                @endguest
                @auth
                  @if(!Auth::user()->is_admin)
                  @if ($package->limit == 0)
                    {{-- <a class="card-explore__link" href="#" @disabled(true)>NOT AVAILABLE<i class="ti-arrow-right"></i></a> --}}
                    <strong>NOT AVAILABLE</strong>
                  @else
                    <a class="card-explore__link" href="{{route('booking.form', ['package'=>$package->id])}}">Book Now <i class="ti-arrow-right"></i></a>
                  @endif
                  @endif
                @endauth  
            </div>
          </div>
        </div>
        @endforeach
      </div>
    {{-- </section> --}}
    <!-- ================ Explore section end ================= --> 

    <!-- ================ special section start ================= -->
  <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          <img src="{{asset('img/p23.png')}}" width="80" height="80" alt="">
        </div>
        <h2>Where Are We Located</h2>
      </div>
      <div class="special-img mb-30px">
        <img class="img-fluid" src="{{asset('img/p27.jpg')}}" alt="">
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card card-special">
            <div class="media align-items-center mb-1">
              <span class="card-special__icon"><i class="ti-home"></i></span>
              <div class="media-body">
                <h4 class="card-special__title">Address</h4>
              </div>
            </div>
            <div class="card-body">
              <p align="justify">NO JC60, JALAN BMU 3 BANDAR MERLIMAU MELAKA 77300 Jasin, Malacca, Malaysia</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card card-special">
            <div class="media align-items-center mb-1">
              <span class="card-special__icon"><i class="ti-notepad"></i></span>
              <div class="media-body">
                <h4 class="card-special__title">Mission</h4>
              </div>
            </div>
            <div class="card-body">
              <p align="justify">To provide the Best-In-Class travel services and enhance customer’s travel experience.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="card card-special">
            <div class="media align-items-center mb-1">
              <span class="card-special__icon"><i class="ti-notepad"></i></span>
              <div class="media-body">
                <h4 class="card-special__title">Vission</h4>
              </div>
            </div>
            <div class="card-body">
              <p align="justify">To pursuing business and provide online travel service more efficiently and to make convenient for our customers.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ special section end ================= -->

    <!-- ================ news section start ================= -->
    <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-80px">
          <div class="section-intro__style">
            <img src="{{asset('img/p23.png')}}" width="80" height="80" alt="">
          </div>
          <h2>Our Product & Services</h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{asset('img/p40.jpeg')}}" alt="">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">Accommodation</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 20th Nov, 2022</a></li>
                </ul>
                <p align="justify">We provide a very comfortable place to stay for our beloved customers. You need to have a comfortable place to rest at the end of the day, which is why your choice of accommodation is so important. But with Kirana Holidays, worries no more. We provide you the best accomodation with the amenities or services that are important for current and future customers.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{asset('img/p20.jpg')}}" alt="">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">Transportation</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 20th Nov, 2022</a></li>
                </ul>
                <p align="justify">Tourist transportation will be handled prestigiously, we know and constantly meet the expectations of all our customers and we ensure the staff are fully trained in safe practices and customer service to deal with any situation. We have a close association with many tourist based operations in Malaysia and our commitment to high quality operations is expected.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{asset('img/p38.jpg')}}" alt="">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">Special Packages</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 20th Nov, 2022</a></li>
                </ul>
                <p align="justify">Book your holiday vacation package or honeymoon trip vacation with us, the top travel agency in Melaka, right away! Our travel agency also offers unique package deals with a limited validity period of the group tours. The finest deals are available right here at our travel agency, along with safe journey.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ news section end ================= -->

	<!-- ================ carousel section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-20px">
        <div class="section-intro__style">
          <img src="{{asset('img/p23.png')}}" width="80" height="80" alt="">
        </div>
        <h2>Our Customer Love Us</h2>
      </div>
      <div class="owl-carousel owl-theme testi-carousel">
        <div class="testi-carousel__item">
          <div class="media">
            <div class="testi-carousel__img">
              <img src="{{asset('img/ceo.png')}}" alt="">
            </div>
            <div class="media-body">
              <div class="testi-carousel__intro">
                <h3>Zam Zam Bin Kassim</h3>
                <p>CEO & Founder</p>
              </div>
            </div>
          </div>
        </div>

        <div class="testi-carousel__item">
          <div class="media">
            <div class="testi-carousel__img">
              <img src="{{asset('img/p33.png')}}" alt="">
            </div>
            <div class="media-body">
              <div class="testi-carousel__intro">
                <h3>Siti Au'la Binti Zam Zam</h3>
                <p>Staff</p>
              </div>
            </div>
          </div>
        </div>

        <div class="testi-carousel__item">
          <div class="media">
            <div class="testi-carousel__img">
              <img src="{{asset('img/p29.png')}}" alt="">
            </div>
            <div class="media-body">
              <div class="testi-carousel__intro">
                <h3>Mohammad Nafeesi Bin Zam Zam</h3>
                <p>Tour Guide</p>
              </div>
            </div>
          </div>
        </div>

        <div class="testi-carousel__item">
          <div class="media">
            <div class="testi-carousel__img">
              <img src="{{asset('img/p30.png')}}" alt="">
            </div>
            <div class="media-body">
              <div class="testi-carousel__intro">
                <h3>Mohammad Najad Bin Zam Zam</h3>
                <p>Tour Guide</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ carousel section end ================= -->
  </main>
@endsection