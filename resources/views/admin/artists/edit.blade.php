@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Artist</h1>
        <form action="{{ route('admin.artists.update', $genre) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
