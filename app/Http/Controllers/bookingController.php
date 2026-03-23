<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\event;

class bookingController extends Controller
{
    public function index()
    {
        $booking = booking::all();
        $event = event::all();
        return view(
            'daftar',
            [
                'booking' => $booking,
                'event' => $event
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $booking = booking::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect('home')->with('success', 'Booking berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $booking = booking::find($id);
        $booking->delete();
        return redirect('home')->with('success', 'Booking berhasil dihapus');
    }
}
