<?php

namespace App\Http\Controllers;
use App\Models\Showtime;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($showtimeId)
    {
        $showtime = Showtime::findOrFail($showtimeId);
        $bookedSeats = Booking::where('showtime_id', $showtimeId)->pluck('seat')->toArray();
        $availableSeats = ['A1', 'A2', 'B1', 'B2'];
        return view('bookings.create', compact('showtime', 'bookedSeats', 'availableSeats'));
    }

    public function store(Request $request)
    {
        $userId = Session::get('user_id');
        if (!$userId) return redirect('/login');

        Booking::create([
            'user_id' => $userId,
            'showtime_id' => $request->showtime_id,
            'seat' => $request->seat,
        ]);
        return redirect('/movies')->with('success', 'Booked!');
    }

    public function index()
    {
        $userId = Session::get('user_id');
        if (!$userId) return redirect('/login');

        $bookings = Booking::where('user_id', $userId)->with('showtime.movie')->get();
        return view('bookings.index', compact('bookings'));
    }
     public function show($id)
    {
        $userId = Session::get('user_id');
        if (!$userId) return redirect('/login');

        $booking = Booking::where('id', $id)->where('user_id', $userId)->with('showtime.movie')->firstOrFail();
        return view('bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $userId = Session::get('user_id');
        if (!$userId) return redirect('/login');
        $booking = Booking::where('id', $id)->where('user_id', $userId)->firstOrFail();
        $booking->delete();
        return redirect('/my-bookings')->with('success', 'Booking canceled!');
    }
    public function myBookings()
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return redirect('/login')->with('error', 'Please log in to view your bookings.');
        }
        $bookings = Booking::where('user_id', $userId)->with('showtime.movie')->get();
        return view('bookings.index', compact('bookings'));
    }
}
