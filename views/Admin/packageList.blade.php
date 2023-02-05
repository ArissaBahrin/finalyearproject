@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
           <div class="row bg-title">
               <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                   <h4 class="page-title">LIST PACKAGE</h4> 
                </div>
               <!-- /.col-lg-12 -->
           </div>
           <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                   <ol class="breadcrumb" style="background-color:#edf1f5">
                       <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                       <li class="active" style="font-size:15px; color:black">List of packages</li>
                   </ol>
               </div>
      
       <!-- /.container-fluid -->
       <!-- table -->
           <!-- ============================================================== -->
           <div class="row">
                <div class="col-12">
                    @include('Admin.components.message')
                </div>
               <div class="col-md-11 col-lg-11 col-sm-11">
                   <div class="white-box">
                       <h3 class="box-title">List of Packages</h3>
                       <div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>NO</th>
                                       <th>THUMBNAIL</th>
                                       <th>MAX NO OF PAX</th>
                                       <th>NAME</th>
                                       <th>DAYS</th>
                                       <th>NIGHTS</th>
                                       <th>RM/ADULT</th>
                                       <th>RM/CHILD</th>
                                       <th>ACTION</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @forelse ($packages as $package)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('storage/'.$package->thumbnail_path)}}" alt="{{$package->name}}" height="100" width="100"></td>
                                    <td>{{$package->limit}}</td>
                                    <td>{{$package->name}}</td>
                                    <td>{{$package->days}}</span></td>
                                    <td>{{$package->nights}}</td>
                                    <td>{{$package->adult_price}}</td>
                                    <td>{{$package->children_price}}</td>
                                    <td><a href="{{route('admin.package.edit', ['package'=>$package->id])}}" class="btn btn-success">EDIT</a>
                                        <a href="{{route('admin.package.delete', ['package'=>$package->id])}}" class="btn btn-danger">DELETE</a> </td>  
                                    </tr>
                                   @empty
                                       No Package Available
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