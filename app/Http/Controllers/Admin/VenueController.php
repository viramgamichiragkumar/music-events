<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        Venue::create($request->all());
        return redirect()->route('admin.venues.index')->with('success', 'Venue created successfully');
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $venue->update($request->all());
        return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully');
    }
}
