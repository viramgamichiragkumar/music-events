@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Filtered Events</h1>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">Date: {{ $event->date }}</p>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
@endsection
