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
            <li class="nav-item"><a class="nav-link" href="{{route('package.index')}}">Tour Destination</a></li>
            @guest
              <li class="nav-item active"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            @endguest
            @auth
              @if (!Auth::user()->is_admin)
                <li class="nav-item active"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
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
<section class="contact-banner-area" id="gallery">
    <div class="container h-100">
        <div class="contact-banner">
            <div class="text-center">
                <h1>Gallery</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
        </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
	
  <!-- ================ start gallery section ================= -->	
	<section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          <img src="{{asset('img/p23.png')}}" width="80" height="60"  alt="">
        </div>
        <h2>Our Gallery</h2>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-12 mb-4">
							<a href="img/p12.jpg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p12.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 mb-4">
							<a href="img/p20.jpg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p20.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<div class="row">
						<div class="col-sm-6 mb-4">
							<a href="img/p1.jpg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p1.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-6 mb-4">
							<a href="img/p5.jpeg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p5.jpeg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12 mb-4">
							<a href="img/p9.jpg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p9.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 mb-4">
							<a href="img/p3.jpeg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p3.jpeg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-6 mb-4">
							<a href="img/p10.jpg" class="img-gal card-img">
								<div class="single-imgs relative">		
									<div class="overlay overlay-bg"></div>
									<div class="relative">				
										<img class="card-img rounded-0" src="{{asset('img/p10.jpg')}}" alt="">		
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
  <!-- ================ end gallery section ================= -->	
@endsection