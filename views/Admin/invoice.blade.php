@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">CUSTOMER PAYMENT</h4> 
            </div>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb" style="background-color:#edf1f5">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="active" style="font-size:15px; color:black">View Receipt</li>
                </ol>
        </div>
        <!-- /.row -->
        <!-- .row -->
        
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="white-box">
                <center><b class="page-title">KIRANA HOLIDAYS PAYMENT</b></center><hr><br><br><br>
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">NAME: {{$booking->customer_name}}</label>
                            <br><br>
                            <label class="col-md-12">EMAIL: {{$booking->customer_email}}</label>
                            <br><br>
                            <label class="col-md-12">PHONE NO: {{$booking->customer_phone}}</label>
                            <br><br>
                            <label class="col-md-12">ADDRESS: {{$booking->user->address}}</label>
                            <br><br>
                            <label class="col-md-12">PACKAGE DESTINATION: {{$booking->package->name}}</label>
                            <br><br>
                            <label class="col-md-12">TOTAL AMOUNT TO BE PAID: RM {{$booking->total}}</label> 
                        </div>
                    </form>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="white-box">
                <center><b class="page-title">ACCOUNT BANK DETAILS</b></center><hr><br><br><br>
            
                    <label>ACCOUNT NAME:</label>
                    <p>MUHAMMAD NAFEESI BIN ZAM ZAM</p>
                    <br>
                    <label>ACCOUNT BANK:</label>
                    <p>CIMB BANK</p>
                    <br>
                    <label>ACCOUNT BANK NUMBER:</label>
                    <p>04-015-02-510737-0</p>
                    <hr><br>

                    <label>PAYMENT RECEIPT:</label><br>
                    <div class="upload-btn-wrapper1">
                        @if ($booking->receipt_path)
                            <a href="{{ asset('storage/'.$booking->receipt_path) }}" target="_blank">
                                <button class="btn1">UPLOADED RECEIPT</button>
                            </a>
                        @else
                            <span class="btn1">PAYMENT PENDING</span>
                        @endif
                    </div>
            </div>
        </div>
      
        <!-- /.row -->
    </div>
</div>
@endsection