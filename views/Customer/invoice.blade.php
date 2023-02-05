@extends('Customer.layouts.appV2')
@section('content')
<style>
* {
    box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 500px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.center {
margin: auto;
width: 50%;
border: 3px ;
padding: 10px;
}

.upload-btn-wrapper {
position: relative;
overflow: hidden;
display: inline-block;
}

.btn {
border: 2px solid #cca772;
color: white;
background-color: #cca772;
padding: 8px 20px;
border-radius: 0px;
font-size: 20px;
font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
font-size: 100px;
position: absolute;
left: 0;
top: 0;
opacity: 0;
}
</style>
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
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
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
                <h1>Invoice</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
        </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<br><br>
<br>

<div class="container">
    @include('Customer.components.alert')
    <form action="{{route('booking.update', ['booking'=>$booking->id])}}" method="POST" enctype="multipart/form-data">
                <center><a href="index.html"><img src="{{asset('img/logo k.png')}}" alt="" width="200" height="70"></a></center><br>
                <center><p>+012 933 8462 | kiranaholidays@gmail.com</p></center><br>

        <!-- ================ receipt area start ================= -->
        <div class="row">
            <div class="column" style="background-color:#f1f2f6;">
                <center><h5>KIRANA HOLIDAYS PAYMENT</h5></center><hr>
                <br>

                <b><label class="name">Name: {{$booking->customer_name}}</label></b><br>
                <b><label class="email">Email: {{$booking->customer_email}}</label></b><br>
                <b><label class="number">Phone Number: {{$booking->customer_email}}</label></b><br>
                <b><label class="address">Address: {{$booking->user->address ?? ''}}</label></b><br>
                <b><label class="destination">Package Destination: {{$booking->package->name}}</label></b><br>
                <b><label class="total">Total Amount to be paid: RM{{$booking->total}}</label></b><br>
            </div>
            
            <div class="column" style="background-color:#ffffff;">
                <h5>ACCOUNT BANK DETAILS</h5>
                <br><br>
                <b><p>ACCOUNT NAME: MUHAMMAD NAFEESI BIN ZAM ZAM</p></b>
                <b><p>ACCOUNT BANK: CIMB BANK</p></b>
                <b><p>ACCOUNT BANK NUMBER: 04-015-02-510737-0</p></b>
                <hr>
                @csrf
                @if ($booking->receipt_path)
                    <center>
                        <div class="col-10 m-0">
                            <div class="form-group m-0">
                                <b><p>Uploaded payment receipt: </p></b>
                                <a href="{{ asset('storage/'.$booking->receipt_path) }}" target="_blank">
                                    <button type="button" class="btn"><i class="fa fa-download"></i> Payment Receipt </button>
                                </a>
                            </div>
                        </div>
                    </center>
                @elseif (!$booking->receipt_path && $booking->status != 0)
                    @if (Auth::user()->id == $booking->user_id)
                        <label for="receipt"><b>Upload Your Payment Receipt Here: (accept png and pdf file) </b></label>
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="file" id="receipt" name="receipt" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </div>
                    @endif
                    <center>
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-warning" role="alert">
                                Pending payment.
                            </div>
                        </div>
                    </center>
                @endif
            </div>
        <!-- ================ receipt area end ================= -->
        </div>
    </form>
    <br><br><br>
</div>
@endsection