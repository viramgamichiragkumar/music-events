<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $events = Event::where('title', 'like', '%' . $searchTerm . '%')->get();
        return view('events.search', compact('events', 'searchTerm'));
    }
}
