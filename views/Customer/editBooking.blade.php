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
                <li class="nav-item active"><a class="nav-link" href="{{route('booking.list')}}">History</a></li>
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
              @if (Auth::user()->is_admin)
                <h1>CUSTOMER'S BOOKING</h1>
              @else
                <h1>MY BOOKING</h1>
              @endif
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            @if (Auth::user()->is_admin)
              <li class="breadcrumb-item active" aria-current="page">Customer's Booking</li>
            @else
              <li class="breadcrumb-item active" aria-current="page">My Booking</li>
            @endif
        </ol>
        </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<br><br><br>
<!-- ================ booking form area ================= -->
@include('Customer.components.alert')
<form action="{{route('booking.update', ['booking'=>$booking->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h2 2 class="mb-4"><center>Itinerary</center></h2>
        <center>
            <a href="{{URL::to('/').'/storage/'.$package->itinery_path}}" target="_blank">
                <button type="button" class="button button--active home-banner-btn mt-1"><i class="fa fa-download"></i> Download</button>
            </a>
        </center>

        <hr class="new4" style="width:40%"><br><br>
            <h2 class="mb-4"><span class="d-block">Booking Details</span></h2>
            @include('Customer.components.bookingForm')
            <hr>
            <h2 class="mb-4"><span class="d-block">Dependent</span></h2>
            <label for="name"><b>Dependent's Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" value="{{$booking->user->dependent->name}}" readonly>

            <label for="email"><b>Dependent's Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" value="{{$booking->user->dependent->email}}" readonly>

            <label for="number"><b>Dependent's Phone Number</b></label>
            <input type="text" placeholder="Enter Phone Number" name="number" id="number" value="{{$booking->user->dependent->phone_num}}" readonly>

            <label for="address"><b>Dependent's Address</b></label>
            <input type="text" placeholder="Enter Phone Number" name="address" id="address" value="{{$booking->user->dependent->address}}" readonly>

            <label for="relationship"><b>Dependent's Relationship</b></label>
            <input type="text" placeholder="Enter No of Pax" name="pax" id="relationship" value="{{$booking->user->dependent->relationship}}" readonly>

            <label for="vaccine"><b>Dependent's Vaccine</b></label>
            <input type="text" placeholder="N/A" name="vaccine" id="vaccine" value="{{$booking->user->dependent->vaccine}}" readonly>
            {{-- @if ($booking->receipt_path)
              <center>
                <div class="col-10 m-0">
                  <div class="form-group m-0">
                    <a href="{{ asset('storage/'.$booking->receipt_path) }}" target="_blank">
                      <button type="button" class="btn"><i class="fa fa-download"></i> Payment Receipt </button></a>
                    </div>
                </div>
              </center>
            @elseif (!$booking->receipt_path && $booking->status != 0)
            @if (Auth::user()->id == $booking->user_id)
            <label for="receipt"><b>Upload payment receipt</b></label>
            <div class="col-md-10">
              <div class="form-group">
                  <input type="file" id="receipt" name="receipt" required>
              </div>
            </div>
            @endif
            <center>
              <div class="d-flex justify-content-center">
                <div class="alert alert-warning" role="alert">
                  Payment receipt need to be uploaded first before you can proceed.
                </div>
              </div>
            </center>
            @endif --}}

            <center>
              <div class="col-10 m-0">
                <div class="form-group m-0">
                  <a href="{{route('booking.invoice', ['booking'=>$booking->id])}}">
                    <button type="button" class="btn">View Receipt </button></a>
                  </div>
              </div>
            </center>            

            <br><br>
            {{-- <p>By creating a booking you agree to our <a href="#">Terms & Privacy</a>.</p> --}}

        @if ($booking->status == 1)
            @if (!$booking->receipt_path && $booking->status != 0 && Auth::user()->is_admin)
              <div class="d-flex justify-content-center">
                <div class="alert alert-warning" role="alert">
                    Pending payment by customer.
                </div>
              </div>
            @endif

            @if (!Auth::user()->is_admin && $booking->receipt_path)
              <div class="alert alert-info" style="text-align: center" role="alert">
                Your booking will be approved once our staff has checked you payment.
              </div>
            @endif

            @if (!Auth::user()->is_admin && !$booking->receipt_path)
              <div class="alert alert-warning" style="text-align: center" role="alert">
                Please upload your payment receipt in the invoice page so that we can approve your booking. <strong>Once payment is made you cannot cancel your booking</strong>.
              </div>
            @endif

            @if (Auth::user()->id == $booking->user_id && !$booking->receipt_path)
              <a href="{{route('booking.cancel', ['booking'=>$booking->id])}}" class="registerbtn2" style="text-align: center; background-color: darkred; color: white">Cancel</a>
            @endif

            @if (Auth::user()->is_admin && $booking->receipt_path)
              <a href="{{route('booking.accept', ['booking'=>$booking->id])}}" class="registerbtn2" style="text-align: center; background-color: darkcyan; color: white">Approve</a>
            @endif

        @elseif ($booking->status == 2)
          @if (Auth::user()->is_admin && $booking->receipt_path)
            <a href="{{route('booking.complete', ['booking'=>$booking->id])}}" class="registerbtn2" style="text-align: center; background-color: darkolivegreen; color: white">Complete</a>
          @else
            <div class="alert alert-info" style="text-align: center" role="alert">
              The booking has been approved.
            </div>
          @endif
        @elseif ($booking->status == 3)
            <div class="alert alert-success" style="text-align: center" role="alert">
              Booking trip has passed and completed successfully!
            </div>
        @else
            <div class="alert alert-danger" style="text-align: center" role="alert">
                The booking has been cancelled.
            </div>
        @endif
    </div>   
</form>
<br><br><br>
<!-- ================ booking form area end ================= -->
@endsection