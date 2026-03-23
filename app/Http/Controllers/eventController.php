<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\booking;

class eventController extends Controller
{
    public function home()
    {
        return view('home', [
            'totalEvents' => event::count(),
            'totalBookings' => booking::count(),
            'availableEvents' => event::where('is_available', true)->count(),
            'totalSeats' => event::sum('seat'),
            'latestEvents' => event::latest()->take(5)->get()
        ]);
    }

    public function index()
    {
        $event = event::all();
        return view('event', ['event' => $event]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_event' => 'required',
            'date' => 'required',
            'location' => 'required',
            'photo' => 'required',
            'is_available' => 'required',
            'seat' => 'required',
        ]);
        $file = $request->file('photo');
        $path = $file->store('photo', 'public');

        $event = event::create([
            'name_event' => $request->name_event,
            'date' => $request->date,
            'location' => $request->location,
            'photo' => $path,
            'is_available' => $request->is_available,
            'seat' => $request->seat,
        ]);

        return redirect('event')->with('success', 'Event berhasil ditambahkan');
    }
}
