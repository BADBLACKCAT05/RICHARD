<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Get the authenticated user ID
        $userId = auth()->id();

        $booking = new Booking();
        $booking->category = $request->category;
        $booking->room = $request->room;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->email = $request->email;
        $booking->action = $request->action;
        $booking->total_price = $request->total_price;
        $booking->user_id = $userId; // Associate the booking with the authenticated user
        $booking->save();

        return response()->json(['message' => 'Booking saved successfully'], 200);
    }

    public function index()
    {
        // Get bookings associated with the authenticated user
        $userId = auth()->id();
        $bookedRooms = Booking::where('user_id', $userId)->get();

        return response()->json($bookedRooms);
    }
}
