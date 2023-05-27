<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artists.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(Request $request)
    {
        Artist::create($request->all());
        return redirect()->route('admin.artists.index')->with('success', 'Artist created successfully');
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->update($request->all());
        return redirect()->route('admin.artists.index')->with('success', 'Artist updated successfully');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('admin.artists.index')->with('success', 'Artist deleted successfully');
    }
}
