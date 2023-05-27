@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>
        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select name="genre_id" id="genre" class="form-control" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ $event->genre_id == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <select name="venue_id" id="venue" class="form-control" required>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}"
                            {{ $event->venue_id == $venue->id ? 'selected' : '' }}>
                            {{ $venue->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="short_description">Short description:</label>
                <textarea name="short_description" id="short_description" class="form-control" rows="5">{{ $event->short_description }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
