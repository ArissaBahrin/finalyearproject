<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\BookingAccepted;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    public function bookingList()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('Admin.CustomerBookingList', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $package = Package::withTrashed()->find($booking->package_id);
        return view('Admin.bookingDetails', compact('booking', 'package'));
    }

    public function bookingInvoice(Booking $booking)
    {
        return view('Admin.invoice', compact('booking'));
    }

    public function acceptBooking(Booking $booking)
    {
        $booking->status = 2;
        $booking->save();

        $details = array(
            'package_name' => $booking->package->name,
            'name' => $booking->customer_name,
            'phone' => $booking->customer_phone,
            'email' => $booking->customer_email,
            'pax' => $booking->pax,
            'total' => $booking->total,
            'url_invoice' => route('booking.list')
        );

        Notification::route('mail', $booking->customer_email)->notify(new BookingAccepted($details));

        return redirect()->back()->with('message', 'The booking has been approved.');
    }

    public function completeBooking(Booking $booking)
    {
        $booking->status = 3;
        $booking->save();

        return redirect()->back()->with('message', 'The booking has been completed.');
    }

    public function filterBooking($status)
    {
        $bookings = Booking::where('status', $status)->orderBy('created_at', 'desc')->get();
        return view('Admin.customerBookingList', compact('bookings'));
    }

    public function adminSearchBooking(Request $request)
    {
        $bookings = Booking::where('id', $request->search)
                            ->orWhereRelation('user', 'name', 'like','%'.$request->search.'%')
                            ->orWhereRelation('package', 'name', 'like','%'.$request->search.'%')
                            ->get();
    
        return view('Admin.customerBookingList', compact('bookings'));
    }
}
