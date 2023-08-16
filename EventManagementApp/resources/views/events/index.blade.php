@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <form action="{{ route('events.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category" class="form-control">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(request('category') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="search">Search:</label>
                        <input type="text" name="search" class="form-control" placeholder="Search events..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($events as $event)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </div>
@endsection

