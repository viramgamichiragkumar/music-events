@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome {{ auth()->user()->name }}</h1>
    </div>
@endsection
