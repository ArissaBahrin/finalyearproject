@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">PROFILE</h4> 
            </div> 
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb" style="background-color:#edf1f5">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="active" style="font-size:15px; color:black">Staff Profile</li>
                </ol>
        </div>
        <!-- /.row -->
        <!-- .row -->
        
        <div class="col-md-10 col-lg-10 col-sm-10">
            <div class="white-box">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{Auth::user()->name}}" class="form-control form-control-line" readonly> </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{Auth::user()->email}}" class="form-control form-control-line" name="example-email" id="example-email" readonly> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection