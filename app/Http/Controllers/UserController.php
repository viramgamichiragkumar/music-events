<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $events = Event::paginate(20);

        return view('user.events.index', compact('events'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $events = Event::where('title', 'like', '%' . $searchTerm . '%')->paginate(20);

        return view('user.events.search', compact('searchTerm', 'events'));
    }

    public function filter(Request $request)
    {
        $artist = $request->input('artist');
        $genre = $request->input('genre');
        $date = $request->input('date');
        $venue = $request->input('venue');

        $query = Event::query();

        if ($artist) {
            $query->whereHas('artist', function ($q) use ($artist) {
                $q->where('name', $artist);
            });
        }

        if ($genre) {
            $query->whereHas('genre', function ($q) use ($genre) {
                $q->where('name', $genre);
            });
        }

        if ($date) {
            $query->whereDate('date', $date);
        }

        if ($venue) {
            $query->whereHas('venue', function ($q) use ($venue) {
                $q->where('name', $venue);
            });
        }

        $events = $query->paginate(20);

        return view('user.events.filter', compact('artist', 'genre', 'date', 'venue', 'events'));
    }
}
