<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $countPackage = Package::all()->count();
        $countBooking = Booking::all()->count();
        $profit = Booking::all()->sum('total');
        $packages = Package::withSum('booking', 'total')->orderBy('booking_sum_total', 'desc')->get();

        return view('Admin.dashboard', compact('countPackage', 'countBooking', 'profit', 'packages'));
    }
}
