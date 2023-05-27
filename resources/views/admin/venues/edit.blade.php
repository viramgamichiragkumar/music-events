@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Venue</h1>
        <form action="{{ route('admin.venues.update', $venue) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $venue->name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $venue->address }}" >
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" value="{{ $venue->contact_number }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
