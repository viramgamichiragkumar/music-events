@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Artists</h1>
        <a href="{{ route('admin.artists.create') }}" class="btn btn-primary mb-3">Add Genre</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>
                            <a href="{{ route('admin.artists.edit', $genre) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.artists.destroy', $genre) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this genre?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
