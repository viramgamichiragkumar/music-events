@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results for "{{ $searchTerm }}"</h1>
        @if (count($events) > 0)
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/app/'.$event->image) }}" class="card-img-top" alt="{{ $event->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">Date: {{ $event->date }}</p>
                                <a href="{{ route('events.show', $event) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No events found.</p>
        @endif
    </div>
@endsection
