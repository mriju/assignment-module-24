@extends('layouts.app')

@section('content')
    <h1>Event Details</h1>
    <p><strong>Title:</strong> {{ $event->title }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Time:</strong> {{ $event->time }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
