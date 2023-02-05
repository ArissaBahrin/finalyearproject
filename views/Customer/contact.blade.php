@extends('Customer.layouts.appV2')
@section('content')
<style>
  .collapsible {
    background-color: #cca772;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
  }
  
  .active1, .collapsible:hover {
    background-color: #cca772;
  }
  
  .content {
    padding: 0 18px;
    display: block;
    overflow: hidden;
    background-color: #f1f1f1;
    
  }
  
  .content2 {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
    
  }
  </style>
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
              <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
              <li class="nav-item active"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            @endguest
            @auth
              @if (!Auth::user()->is_admin)
                <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about')}}">About</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
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
	<section class="contact-banner-area" id="contact">
		<div class="container h-100">
			<div class="contact-banner">
				<div class="text-center">
					<h1>Contact Us</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->

	<section class="section-margin">
    <div class="container">
    
      <!--online enquiry form start-->
      <section class="section-margin">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">
              <div class="card card-explore">
                <p><b><center>QUESTION AND ANSWER </center></b></p>
                <button type="button" class="collapsible" aria-expanded="true">I'm afraid of being scammed by travel agents, how do I know if KIRANA Holidays can be trusted?</button>
                  <div class="content">
                    <p>1. Check our Ministry of Tourism license for yourself at <a href="https://www.motac.gov.my/en/check/tobtab"  target="_blank">website MOTAC (CLICK) </a></p>
                    <p>2. Check us out on the official Kirana holidays facebook page at <a href="https://www.facebook.com/profile.php?id=100084582249772" target="_blank">official FACEBOOK (CLICK)</a></p>
                  </div>
                  <button type="button" class="collapsible">What is the difference between the KIRANA Holidays package compared to other companies?</button>
                  <div class="content2">
                    <p>All KIRANA Holidays packages have gone through a strict research & development (R&D) process by our staff.</p>
                    
                    <p> We have been running this travel agency business for over 5 years abroad and in the country. We also put together an itinerary as if we were bringing our own family. </p>
                    
                    <p> We attach great importance to the 'real experience' element (activities, food, accommodation, history, language, culture, shopping) in every package we produce. Not just taking pictures and shopping abroad.</p>
                    
                    <p>For domestic packages, we design our own packages as a result of our in-depth research in interesting places in Malaysia.
                         We don't just take & sell other people's packages (just being a middleman). </p>

                    <p> Ever heard of the 'Tourist Trap'? 'Tourist Trap' is a forced place to buy expensive goods (fake shopping stops). It's a waste of time and it's not the real experience you should feel in that place. </p>
                  
                    <p> Most Malaysian tourists who have gone abroad with a travel agency end up being 'affected' consciously or not. </p>
                  
                    <p> Kirana Holidays is the only licensed travel agency that does not take you to the place. We feel that is not the 'real experience' that you should feel. </p>
                  
                    <p> Because of that we produce our own package and our itinerary is different from others. Say "No To Tourist Trap!" </p>
                    
                  </div>
                  <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;
                    
                    for (i = 0; i < coll.length; i++) {
                      coll[i].addEventListener("click", function() {
                        this.classList.toggle("active1");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                          content.style.display = "none";
                        } else {
                          content.style.display = "block";
                        }
                      });
                    }
                    </script>
              </div>
            </div>
  
            
              <div class="row">
                <div class="col-12 my-6 mb-md-6">
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                      <h3>Malacca Malaysia</h3>
                      <p>Bandar Baru Merlimau </p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                    <div class="media-body">
                      <h3><a href="tel:454545654">+60 12-933 8462</a></h3>
                      <p>Mon to Fri 10am to 4pm</p>
                    </div>
                  </div>
                  <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                      <h3><a href="mailto:support@colorlib.com">kiranaholidays@gmail.com </a></h3>
                      <p>Send us your query anytime!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--online enquiry form end-->
    </div>
  </section>
@endsection