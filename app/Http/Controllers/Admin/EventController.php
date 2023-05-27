<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Genre;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $genres = Genre::all();
        $venues = Venue::all();
        return view('admin.events.create', compact('genres', 'venues'));
    }

    public function store(Request $request)
    {
        $imagePath = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $data = $request->except('image');
        }
        $data['image'] = $imagePath;
    

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
    }

    public function edit(Event $event)
    {
        $genres = Genre::all();
        $venues = Venue::all();
        return view('admin.events.edit', compact('event', 'genres', 'venues'));
    }

    public function update(Request $request, Event $event)
    {
        
    $data = $request->except('image');

    if ($request->hasFile('image')) {
        // Delete the previous image if needed
        if ($event->image) {
            Storage::delete($event->image);
        }

        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        $data['image'] = $imagePath;
    }

    $event->update($data);
        // $event->update($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }
}
