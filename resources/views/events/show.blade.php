@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/app/'.$event->image) }}" alt="{{ $event->title }}" class="img-fluid mb-4">
            </div>
            <div class="col-md-6">
                <h5>Date: {{ $event->date }}</h5>
                <p>Genre: {{ $event->genre->name }}</p>
                <p>Venue: {{ $event->venue->name }}</p>
                <p>Description: {{ $event->description }}</p>
            </div>
        </div>
    </div>
@endsection
