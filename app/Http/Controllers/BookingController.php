<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BookingNotification;
use App\Notifications\AdminBookingNotification;

class BookingController extends Controller
{
    public function show(Package $package)
    {
        $user = User::find(Auth::user()->id);
        return view('Customer.bookingV2', compact('user', 'package'));
    }

    public function booking(Package $package, Request $request)
    {
        $package->limit -= 1;
        $package->save();

        $booking = new Booking();
        $booking->package_id = $package->id;
        $booking->user_id = Auth::user()->id;
        $booking->customer_name = $request->cust_name;
        $booking->customer_email = $request->cust_email;
        $booking->customer_phone = $request->cust_number;
        $booking->departure_date = $request->departure_date;
        $booking->num_adult = $request->adult_num;
        $booking->num_children = $request->children_num;
        $booking->pax = $request->children_num + $request->adult_num;
        $booking->total = ($request->adult_num * $package->adult_price) + ($request->children_num * $package->children_price);
        $booking->save();

        if(!Auth::user()->dependent) {
            $dependent = new Dependent();
        } else {
            $dependent = Dependent::find(Auth::user()->dependent->id);
        }
        
        $dependent->name = $request->dependent_name;
        $dependent->email = $request->dependent_email;
        $dependent->phone_num = $request->dependent_number;
        $dependent->address = $request->dependent_address;
        $dependent->relationship = $request->dependent_relation;
        $dependent->user_id = Auth::user()->id;
        $dependent->save();

        $user = User::find(Auth::user()->id);
        $user->address = $request->cust_address;
        $user->phone = $request->cust_number;
        $user->save();

        $details = array(
            'package_name' => $package->name,
            'name' => Auth::user()->name,
            'phone' => $request->cust_number,
            'email' => $request->cust_email,
            'pax' => $booking->pax,
            'total' => $booking->total,
            'url_invoice' => route('booking.invoice', ['booking'=>$booking->id]),
            'url_edit' => route('admin.booking.show', ['booking'=>$booking->id]),
        );

        //email notification to customer
        Notification::route('mail', $request->cust_email)->notify(new BookingNotification($details));

        //email notification to admin
        $admin = Admin::find(1);
        Notification::route('mail', $admin->email)->notify(new AdminBookingNotification($details));

        return redirect()->route('booking.edit', ['booking'=>$booking->id])->with('message', 'Booking submitted successfully! We will contact you soon.');
    }

    public function editBooking(Booking $booking)
    {
        $package = Package::withTrashed()->find($booking->package_id);
        return view('Customer.editBooking', compact('booking', 'package'));
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->status = 0;
        $booking->save();

        return redirect()->back()->with('message', 'Booking is cancelled successfully!');
    }

    public function bookingList()
    {
        if(Auth::user()->is_admin) {
            $bookings = Booking::orderBy('created_at', 'desc')->get();
        } else {
            $bookings = Booking::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        }
        return view('Customer.bookingList', compact('bookings'));
    }

    public function updateBooking(Request $request, Booking $booking)
    {
        $receiptPath = $request->file('receipt')->storeAs(
            'receipt',
            $booking->id.'.'.$request->file('receipt')->getClientOriginalExtension(),
            'public'
        );

        $booking->receipt_path = $receiptPath;
        $booking->save();

        return redirect()->back()->with('message', 'Receipt has been uploaded successfully!');
    }

    public function bookingInvoice(Booking $booking)
    {
        return view('Customer.invoice', compact('booking'));
    }

    public function filterBooking($status)
    {
        $bookings = Booking::where([['status', $status], ['user_id', Auth::user()->id]])->orderBy('created_at', 'desc')->get();
        return view('Customer.bookingList', compact('bookings'));
    }

    public function filterBookingAdmin($status)
    {
        $bookings = Booking::where('status', $status)->orderBy('created_at', 'desc')->get();
        return view('Admin.customerBookingList', compact('bookings'));
    }

    public function searchBooking(Request $request)
    {
        if(Auth::user()->is_admin) {
            $bookings = Booking::whereHas('package', function($query) use($request) {
                                    return $query->where('name', 'like', "%".$request->search."%");
                                })
                                ->orWhere('customer_name', 'like', "%".$request->search."%")
                                ->orWhere('customer_phone', 'like', "%".$request->search."%")
                                ->orWhere('customer_email', 'like', "%".$request->search."%")
                                ->orderBy('created_at', 'desc')
                                ->get();
        } else {
            $bookings = Booking::whereHas('package', function($query) use($request) {
                                    return $query->where('name', 'like', "%".$request->search."%");
                                })
                                ->where('user_id', Auth::user()->id)
                                ->orWhere('customer_name', 'like', "%".$request->search."%")
                                ->orWhere('customer_phone', 'like', "%".$request->search."%")
                                ->orWhere('customer_email', 'like', "%".$request->search."%")
                                ->orderBy('created_at', 'desc')
                                ->get();
        }

        return view('Customer.bookingList', compact('bookings'));
    }
}
