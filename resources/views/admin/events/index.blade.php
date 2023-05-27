@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Add Event</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->genre->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->venue->name }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
