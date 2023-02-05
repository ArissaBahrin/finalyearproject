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
                <h1>BOOKING LIST</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">History</li>
        </ol>
      </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->
<section class="section-margin">
  <div class="container">
    <div class="container d-flex">
      @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
          {{ (Session::get('message')) }}
        </div>
      @endif
    </div>
    <div>
      <form action="{{route('booking.search')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <input type="text" name="search" placeholder="Search by Package">
        </div>
        <center><button type="submit" class="btn btn-primary">Search</button></center>
      </form>
      <br>
    </div>
    <div class="d-flex justify-content-end" style="margin-right: 8%">
      <ul class="nav navbar-nav menu_nav">
        <li class="nav-item submenu dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" style="color: gray"
          aria-expanded="false">Filter by: </a>
          <ul class="dropdown-menu">
            <li class="nav-item pl-3"><a class="nav-link" href="{{route('booking.list')}}" style="color: black">All</a></li>
            <li class="nav-item pl-3"><a class="nav-link" href="{{route('booking.filter.list', ['status'=>1])}}" style="color: black">New</a></li>
            <li class="nav-item pl-3"><a class="nav-link" href="{{route('booking.filter.list', ['status'=>2])}}" style="color: black">Accepted</a></li>
            <li class="nav-item pl-3"><a class="nav-link" href="{{route('booking.filter.list', ['status'=>3])}}" style="color: black">Completed</a></li>
            <li class="nav-item pl-3"><a class="nav-link" href="{{route('booking.filter.list', ['status'=>0])}}" style="color: black">Cancelled</a></li>
          </ul>
        </li>
      </ul>
    </div>

    <table class="table">
      <thead class="" style="background-color: #cca772; color: white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Package</th>
          <th scope="col">Pax</th>
          <th scope="col">Departure Date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($bookings as $booking)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$booking->customer_name}}</td>
            <td>{{$booking->package->name ?? 'N/A'}}</td>
            <td>{{$booking->pax}}</td>
            <td>{{$booking->departure_date}}</td>
            <td>
                @if ($booking->status == 1)
                    <span class="badge badge-pill badge-primary p-2">New</span>
                @elseif ($booking->status == 2)
                    <span class="badge badge-pill badge-info p-2">Accepted</span>
                @elseif ($booking->status == 3)
                    <span class="badge badge-pill badge-success p-2">Completed</span>
                @else
                    <span class="badge badge-pill badge-danger p-2">Cancelled</span>
                @endif
            </td>
            <td>
                <a class="btn" style="box-shadow: none; background-color: darkolivegreen; color: white" href="{{route('booking.edit', ['booking'=>$booking->id])}}">More</a>
            </td>
          </tr>
        @empty
        <td>
          Not available
        </td>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection