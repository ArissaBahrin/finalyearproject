@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">BOOKING DETAILS FORM</h4> 
              </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb" style="background-color:#edf1f5">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li><a href="{{route('admin.booking.list')}}">Booking</a></li>
                    <li class="active" style="font-size:15px; color:black">Booking Details</li>
                </ol>
        </div>
    <!-- /.container-fluid -->
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->

<div class="col-md-10 col-lg-10 col-sm-10">
    <div class="white-box">
            <form class="forms-sample">
                <b class="page-title">CUSTOMER DETAILS </b><br><br><br>

                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">NAME</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->customer_name}}" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-2 col-form-label">ADDRESS</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->address}}" readonly>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">EMAIL</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->customer_email}}" readonly>
                    </div>

                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PHONE NO</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->customer_phone}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">TRAVEL DATE</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->departure_date}}" readonly>
                    </div>

                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">NO OF PAX</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->pax}}" readonly>
                    </div>
                </div>

                
                <br><hr>

                <b class="page-title">DEPENDENT DETAILS </b><br><br><br>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->dependent->name}}" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">ADDRESS</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->dependent->address}}" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-2 col-form-label">EMAIL</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->dependent->email}}" readonly>
                      </div>

                      <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PHONE NO</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->dependent->phone_num}}" readonly>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">RELATIONSHIP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="exampleInputUsername2" value="{{$booking->user->dependent->relationship}}" readonly>
                    </div>
                </div>

                <br><br><br>
                <center>
                    <a href="{{route('admin.booking.invoice', ['booking'=>$booking->id])}}" class="btn btn-warning">VIEW RECEIPT</a>
                    @if ($booking->status == 0)
                      <br><br>
                      <div class="alert alert-danger" role="alert">
                        The booking has been cancelled.
                      </div>
                    @elseif ($booking->status == 1 && $booking->receipt_path)
                        <a href="{{route('admin.booking.accept', ['booking'=>$booking->id])}}" class="btn btn-success">APPROVE</a>
                    @elseif ($booking->status == 2)
                        <a href="{{route('admin.booking.complete', ['booking'=>$booking->id])}}" class="btn btn-success">COMPLETE</a>
                    @elseif ($booking->status == 3)
                    <br><br>
                      <div class="alert alert-success" role="alert">
                        Trip completed.
                      </div>
                    @endif
                </center>
        </div> 
    </div>
</div>
@endsection