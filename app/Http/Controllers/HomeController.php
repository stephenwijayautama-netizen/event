<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use App\Models\booking;

class HomeController extends Controller
{
    public function index()
    {
        $totalEvents = event::count();
        $totalBookings = booking::count();
        $availableEvents = event::where('is_available', true)->count();
        $totalSeats = event::sum('seat');
        
        $latestEvents = event::latest()->take(5)->get();

        return view('home', [
            'totalEvents' => $totalEvents,
            'totalBookings' => $totalBookings,
            'availableEvents' => $availableEvents,
            'totalSeats' => $totalSeats,
            'latestEvents' => $latestEvents
        ]);
    }
}
