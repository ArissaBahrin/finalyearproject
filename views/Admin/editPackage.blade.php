@extends('Admin.layouts.layout')
@section('content')
            <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">EDIT PACKAGE</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb" style="background-color:#edf1f5">
                            <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li><a href="{{route('admin.package.list')}}">List Packages</a></li>
                            <li class="active" style="font-size:15px; color:black">Edit packages</li>
                        </ol>
                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

        <div class="col-md-10 col-lg-10 col-sm-10">
            <div class="white-box">
                <h3 class="box-title"></h3>
                    @include('Admin.components.message')
                    <form class="forms-sample" action="{{route('admin.package.update', ['package'=>$package->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PACKAGE NAME</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="exampleInputUsername2" name="name" value="{{$package->name}}" required>
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">MAX NO OF PAX</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" id="exampleInputUsername2" name="quantity" value="{{$package->limit}}" required>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">DAYS</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" id="exampleInputUsername2" name="days" value="{{$package->days}}" required>
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">NIGHTS</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="exampleInputUsername2" name="nights" value="{{$package->nights}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PRICE ADULT (RM)</label>
                            <div class="col-sm-5">
                              <input type="number" class="form-control" id="exampleInputUsername2" name="adult_price" value="{{$package->adult_price}}" required>
                            </div>
                            <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PRICE CHILD (RM)</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="exampleInputUsername2" name="children_price" value="{{$package->children_price}}" required>
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">ITINERY FILE</label>
                            <div class="col-sm-8">
                                    <input type="file" id="myFile" name="itinery">
                            </div>
                            {{-- uploaded itinerary --}}
                            <div class="col-sm-8">
                                <a href="{{ asset('storage/'.$package->itinery_path) }}" target="_blank">
                                    <button type="button" class="btn"><i class="fa fa-download"></i> Uploaded Itinerary </button>
                                </a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-2 col-form-label">THUMBNAIL</label>
                            <div class="col-sm-8">
                                    <input type="file" id="myFile" name="thumbnail">
                            </div>
                            {{-- uploaded thumbnail --}}
                            <div class="col-sm-8">
                                <a href="{{ asset('storage/'.$package->thumbnail_path) }}" target="_blank">
                                    <button type="button" class="btn"><i class="fa fa-download"></i> Uploaded Thumbnail </button>
                                </a>
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </center>
                </div>
            </div>
        </div>
@endsection