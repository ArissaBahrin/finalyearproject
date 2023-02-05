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
            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
            <li class="nav-item active"><a class="nav-link" href="{{route('package.index')}}">Tour Destination</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Customer Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a></li>
                  </ul>
                </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
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
  <!-- ================ start banner area ================= -->	
	<section class="contact-banner-area" id="blog">
		<div class="container h-100">
			<div class="contact-banner">
				<div class="text-center">
					<h1>TOUR DESTINATION</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tour Destination</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

  <!-- ================ Explore OVERSEAS start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          <img src="{{asset('img/p23.png')}}" width="80" height="80" alt="">
        </div>
        <h2> PACKAGES</h2>
      </div>

      <div class="row">
        @forelse ($packages as $package)
          {{-- @if ($package->country == "Oversea") --}}
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
              <div class="card card-explore">
                <div class="card-explore__img">
                    {{-- <img class="card-img" src="{{asset('storage/thumbnail/'.$package->thumbnail_path)}}" alt=""> --}}
                    <img class="card-img" src="{{asset('storage/'.$package->thumbnail_path)}}" alt="">
                </div>
                <div class="card-body">
                    <h3 class="card-explore__price">RM{{$package->adult_price}} <sub>/ Adult</sub></h3>
                    <h3 class="card-explore__price">RM{{$package->children_price}} <sub>/ Child</sub></h3>
                    <h4 class="card-explore__title"><a href="#">{{$package->name}} ({{$package->days}}D{{$package->nights}}N)</a></h4>
                    {{-- <h4 class="card-explore__title">{{$package->name}}</h4> --}}
                    <p>{{$package->country}}</p>
                    @auth
                      @if(!Auth::user()->is_admin)
                        @if ($package->limit == 0)
                          {{-- <a class="card-explore__link" href="#" @disabled(true)>Not Available<i class="ti-arrow-right"></i></a> --}}
                          <strong>NOT AVAILABLE</strong>
                        @else
                          <a class="card-explore__link" href="{{route('booking.form', ['package'=>$package->id])}}">Book Now <i class="ti-arrow-right"></i></a>
                        @endif
                      @endif
                    @endauth
                    @guest
                      @if ($package->limit == 0)
                        {{-- <a class="card-explore__link" href="#" @disabled(true)>Not Available<i class="ti-arrow-right"></i></a> --}}
                        <strong>NOT AVAILABLE</strong>
                      @else
                        <a class="card-explore__link" href="{{route('booking.form', ['package'=>$package->id])}}">Book Now <i class="ti-arrow-right"></i></a>
                      @endif
                    @endguest
                </div>
              </div>
            </div>
          {{-- @endif --}}
        @empty
            No package for available.
        @endforelse
      </div>
    </div>
  </section>
  <!-- ================ Explore OVERSEAS end ================= --> 
@endsection