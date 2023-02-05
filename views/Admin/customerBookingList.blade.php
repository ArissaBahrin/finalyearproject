@extends('Admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">CUSTOMER BOOKING</h4> 
            </div>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb" style="background-color:#edf1f5">
                    <li><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="active" style="font-size:15px; color:black">Booking</li>
                </ol>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <form action="{{route('admin.booking.search')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search by Id or Name or Package"/>
                                </div>
                            </div>
                            <center>
                                <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </center>
                        </div>

                        <br><br>
                    </form>
                    <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" style="color: gray"
                        aria-expanded="false">Filter by: </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item pl-3"><a class="nav-link" href="{{route('admin.booking.list')}}" style="color: black">All</a></li>
                            <li class="nav-item pl-3"><a class="nav-link" href="{{route('admin.booking.filter.list', ['status'=>1])}}" style="color: black">New</a></li>
                            <li class="nav-item pl-3"><a class="nav-link" href="{{route('admin.booking.filter.list', ['status'=>2])}}" style="color: black">Accepted</a></li>
                            <li class="nav-item pl-3"><a class="nav-link" href="{{route('admin.booking.filter.list', ['status'=>3])}}" style="color: black">Completed</a></li>
                            <li class="nav-item pl-3"><a class="nav-link" href="{{route('admin.booking.filter.list', ['status'=>0])}}" style="color: black">Cancelled</a></li>
                        </ul>
                        </li>
                    </div>
                    {{-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <select class="form-control pull-right row b-none">
                            <option>Sort by total sales:</option>
                            <option>Ascending</option>
                            <option>Descending</option>
                        </select>
                    </div> --}}
                    <h3 class="box-title">List of Customer Booking</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>BOOK ID</th>
                                    <th>NAME</th>
                                    <th>PACKAGE</th>
                                    <th>PAX</th>
                                    <th>TRAVEL DATE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$booking->id}}</td>
                                    <td>{{$booking->user->name}}</td>
                                    <td>{{$booking->package->name}}</td>
                                    <td>{{$booking->num_adult + $booking->num_children}}</td>
                                    <td>{{$booking->departure_date}}</td>
                                    <td>
                                        @if ($booking->status == 1)
                                            <span class="badge badge-pill badge-info p-2" style="padding: 7px">New</span>
                                        @elseif ($booking->status == 2)
                                            <span class="badge badge-pill badge-warning p-2" style="padding: 7px">Accepted</span>
                                        @elseif ($booking->status == 3)
                                            <span class="badge badge-pill badge-success p-2" style="padding: 7px">Completed</span>
                                        @else
                                            <span class="badge badge-pill badge-danger p-2" style="padding: 7px">Cancelled</span>
                                        @endif
                                    </td>
                                    <td><a href="{{route('admin.booking.show', ['booking'=>$booking->id])}}" type="button" class="btn btn-primary">MORE</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        Not available.
                                    </td>
                                </tr>
                                @endforelse 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
@endsection