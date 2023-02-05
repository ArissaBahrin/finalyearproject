@extends('Customer.layouts.appV2')
@section('content')
<style>
* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
}

/*Background color*/
#grad1 {
    background-color:  #f7f1e3;
}

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;

    /*stacking fieldsets above each other*/
    position: relative;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E;
}

#msform input, #msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    /* font-family: montserrat; */
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid grey;
    outline-width: 0;
}

/*Blue Buttons*/
#msform .action-button {
    width: 100px;
    background: #cca772;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px grey;
}

/*Previous Buttons*/
#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
}

/*Dropdown List Exp Date*/
select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px;
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue;
}

/*The background card*/
.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative;
}

/*FieldSet headings*/
.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
}

#progressbar .active {
    color: #000000;
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative;
}

/*Icons in the ProgressBar*/
#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023";
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d";
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
}

/*ProgressBar before any progress*/
#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
}

/*ProgressBar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
}

/*Color number of the step and the connector before it*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #cca772;
}

/*Imaged Radio Buttons*/
.radio-group {
    position: relative;
    margin-bottom: 25px;
}

.radio {
    display:inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor:pointer;
    margin: 8px 2px; 
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
}

/*Fit image in bootstrap div*/
.fit-image{
    width: 100%;
    object-fit: cover;
}

.breadcrumb1{
  padding: 10px 16px;
  list-style: none;
  background-color: white;
  }
  
.breadcrumb1-item{
  display: inline;
  font-size: 18px;
  }

.breadcrumb1 li+li:before{
  padding: 8px;
  color: black;
  content: "/";
}

.breadcrumb1-item a{
  color: #2e4053;
  text-decoration: none;
}

.breadcrumb1-item a:hover{
  color: #cca772;
  text-decoration: underline;
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
    padding: 8px 10px;
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
<br><br><br>
<!-- ================ booking form area ================= -->
    <!-- ================ booking form area ================= -->
    <form action="#" method="POST">
        @csrf
        <div class="container">
            <h2 2 class="mb-4"><center>Itinerary</center></h2>
            <center>
                <a href="{{URL::to('/').'/storage/'.$package->itinery_path}}" target="_blank">
                    <button type="button" class="button button--active home-banner-btn mt-1"><i class="fa fa-download"></i> Download</button>
                </a>
            </center>
            <br>
           {{-- <hr><br>      --}}
        </div>   
    </form>

      <!-- MultiStep Form -->
      <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Booking Form</strong></h2>
                    <p>Fill all the information field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action="{{route('booking.submit', ['package'=>$package->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Package</strong></li>
                                    <li id="personal"><strong>Customer</strong></li>
                                    <li id="payment"><strong>Next of Kin</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                  <div class="form-card">
                                      <h2 class="fs-title">Package Information</h2>
                                      <br>
                                      <label class="name">Package Destination</label>
                                      <input type="text" name="destination" value="{{$package->name}}" readonly/>


                                      <div class="row">
                                          <div class="col-12">
                                              <label class="priceA">Package Price (Adult)</label>
                                              <input type="text" name="adult_price" value="{{$package->adult_price}}" readonly/>
                                          </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-12">
                                            <label class="priceC">Package Price (Children)</label>
                                            <input type="text" name="children_price" value="{{$package->children_price}}" readonly/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="days">Days and Night</label>
                                            <input type="text" name="days" value="{{$package->days}} days {{$package->nights}} nights" readonly/>
                                        </div> 
                                    </div>
                                      <div class="row">
                                          <div class="col-12">
                                              <label class="paxA">No of Pax (Adult)*</label>
                                              <input type="number" name="adult_num" required/>
                                          </div> 
                                      </div>
                                      <div class="row">
                                        <div class="col-12">
                                            <label class="paxC">No of Pax (Children)*</label>
                                            <input type="number" name="children_num" required/>
                                        </div> 
                                    </div>
                                  </div>
                                  <input type="button" name="make_payment" class="next action-button" value="Next Step"/>
                              </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Customer Information</h2>
                                        <br>
                                        <input type="text" name="cust_name" placeholder="name" value="{{Auth::user()->name}}" required/>
                                        <input type="email" name="cust_email" placeholder="example@gmail.com" value="{{Auth::user()->email}}" required/>
                                        <input type="text" name="cust_number" placeholder="Enter Phone Number" value="{{Auth::user()->phone ?? ''}}" required/>
                                        <input type="text" name="cust_address" placeholder="Enter Address" value="{{Auth::user()->address ?? ''}}" required/>
                                        <input type="date" name="departure_date" placeholder="Enter Date" required/>
                                        {{-- <input type="text" name="cust_vaccine" placeholder="Enter Type of vaccine" value="{{Auth::user()->vaccine ?? ''}}" required/> --}}

                                    
                                      <br><br>
                                      
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                    <input type="button" name="next" class="next action-button" value="Next Step"/>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Emergency Contact</h2>
                                        <br>
                                        <input type="text" name="dependent_name" placeholder="Enter Full Name" value="{{$user->dependent->name ?? ''}}" required/>
                                        <input type="email" name="dependent_email" placeholder="Enter Email" value="{{$user->dependent->email ?? ''}}" required/>
                                        <input type="text" name="dependent_number" placeholder="Enter Phone Number" value="{{$user->dependent->phone_num ?? ''}}" required/>
                                        <input type="text" name="dependent_address" placeholder="Enter Address" value="{{$user->dependent->address ?? ''}}" required/>

                                        

                                        <select name="dependent_relation">
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="spouse">Spouse</option>
                                            <option value="friend">Friend</option>
                                        </select>
                                        <br><br><br><br>

                                        <!-- <input type="text" name="dependent_relation" placeholder="Enter your relation with customer" value="{{$user->dependent->relationship ?? ''}}" required/> -->
                                        {{-- <input type="text" name="dependent_vaccine" placeholder="Enter Type of vaccine" value="{{$user->dependent->vaccine ?? ''}}" required/> --}}
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                    {{-- <input type="submit" name="next" class="next action-button" value="Book Now"/> --}}
                                    <button type="submit" class="action-button">Submit</button>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success!</h2>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="{{asset('img/p88.png')}}" class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>Booking submitted successfully!</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- ================ booking form area end ================= -->

<script src={{asset("vendors/jquery/jquery-3.2.1.min.js")}}></script>
<script src={{asset("vendors/bootstrap/bootstrap.bundle.min.js")}}></script>
<script src={{asset("vendors/magnefic-popup/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("vendors/owl-carousel/owl.carousel.min.js")}}></script>
<script src={{asset("vendors/easing.min.js")}}></script>
<script src={{asset("vendors/superfish.min.js")}}></script>
<script src={{asset("vendors/nice-select/jquery.nice-select.min.js")}}></script>
<script src={{asset("vendors/jquery.ajaxchimp.min.js")}}></script>
<script src={{asset("vendors/mail-script.js")}}></script>
<script src={{asset("js/main.js")}}></script>
<script>
  $(document).ready(function(){
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            }, 
            duration: 600
        });
    });
    
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
        
    });
</script>
<br><br><br>
<!-- ================ booking form area end ================= -->
@endsection