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
                    <li class="nav-item active"><a class="nav-link" href="{{route('package.list')}}">All Packages</a></li>
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
                <h1>PACKAGE LIST</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Package List</li>
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

    <table class="table">
      <thead class="" style="background-color: #cca772; color: white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Country</th>
          <th scope="col">Days</th>
          <th scope="col">Nights</th>
          <th scope="col">RM /Adult</th>
          <th scope="col">RM /Child</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($packages as $package)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$package->name}}</td>
            <td>{{$package->country}}</td>
            <td>{{$package->days}}</td>
            <td>{{$package->nights}}</td>
            <td>{{$package->adult_price}}</td>
            <td>{{$package->children_price}}</td>
            <td>
              <form action="{{route('package.destroy', ['package'=>$package->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn" style="background-color: darkolivegreen; color: white; box-shadow: none" href="{{route('package.edit', ['package'=>$package->id])}}">Edit</a>
                <button type="submit" class="btn" style="background-color: darkred; color: white; box-shadow: none">Delete</button>
              </form>
            </td>
          </tr>
        @empty
            
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection