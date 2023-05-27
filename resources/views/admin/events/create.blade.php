@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Event</h1>
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select name="genre_id" id="genre" class="form-control" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <div class="d-flex">
                    <select name="venue_id" id="venue" class="form-control" required>
                        @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                        @endforeach
                    </select>
                    
                    <a href="{{ route('admin.venues.create') }}" class="btn btn-primary">+</a>
                </div>
            </div>
            <div class="form-group">
                <label for="short_description">Short description:</label>
                <textarea name="short_description" id="short_description"  class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
