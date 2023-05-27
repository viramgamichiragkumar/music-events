@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Venue</h1>
        <form action="{{ route('admin.venues.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
