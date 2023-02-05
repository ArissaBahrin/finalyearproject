@extends('Admin.layouts.layout')
@section('content')
            <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Staff Dashboard</h4> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <ol class="breadcrumb" style="background-color:#edf1f5">
                            <li class="active" style="font-size:15px; color:black">Home</li>
                        </ol>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Packages</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$countPackage}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Bookings</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$countBooking}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Profit</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i>RM <span class="counter text-info">{{$profit}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.row -->
                <!--row -->
                <!-- /.row -->
              
                <!-- ============================================================== -->
                <!-- table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">TOP PACKAGES</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>PACKAGE ID</th>
                                            <th>THUMBNAIL</th>
                                            <th>NAME</th>
                                            <th>MAX NO OF PAX</th>
                                            <th>TOTAL SALES (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($packages as $package)
                                        <tr>
                                            <td>{{$package->id}}</td>
                                            <td><img src="{{asset('storage/'.$package->thumbnail_path)}}" alt="{{$package->name}}" height="100" width="100"></td>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->limit}}</td>
                                            <td>{{$package->booking_sum_total ?: 0}}</td>
                                        </tr>
                                        @empty
                                            No packages available.
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
@endsection