@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">ADD PACKAGE</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb" style="background-color:#edf1f5">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="active" style="font-size:15px; color:black">Add packages</li>
                </ol>
        </div>
    <!-- /.container-fluid -->
</div>
<div class="col-md-10 col-lg-10 col-sm-10">
    <div class="white-box">
        <h3 class="box-title"></h3>
            <form class="" action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PACKAGE NAME</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="exampleInputUsername2" name="name" placeholder="Enter Package Name" required>
                  </div>
                  <label for="exampleInputUsername2" class="col-sm-1 col-form-label">MAX NO OF PAX</label>
                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="exampleInputUsername2" name="quantity" placeholder="Enter max no of pax" required>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">DAYS</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" id="exampleInputUsername2" name="days" placeholder="Enter Days" required>
                    </div>
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">NIGHTS</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="exampleInputUsername2" name="nights" placeholder="Enter Nights" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PRICE ADULT (RM)</label>
                    <div class="col-sm-5">
                      <input type="number" class="form-control" id="exampleInputUsername2" name="adult_price" placeholder="Enter Adult price" required>
                    </div>
                    <label for="exampleInputUsername2" class="col-sm-1 col-form-label">PRICE CHILD (RM)</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" id="exampleInputUsername2" name="children_price" placeholder="Enter Child price" required>
                      </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">ITINERY FILE</label>
                    <div class="col-sm-8">
                        {{-- <form action="/action_page.php"> --}}
                            <input type="file" id="myFile" name="itinery" required>
                        {{-- </form> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">THUMBNAIL</label>
                    <div class="col-sm-8">
                        {{-- <form action="/action_page.php"> --}}
                            <input type="file" id="myFile" name="thumbnail" required>
                        {{-- </form> --}}
                    </div>
                </div>

                <center>
                    <button type="submit" class="btn btn-primary">ADD PACKAGE</button>
                    {{-- <a href="ListPackage.html" class="btn btn-warning">ADD PACKAGE</a> --}}
                </center>
            </form>
        </div>
    </div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
</div>
@endsection