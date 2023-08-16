@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <p>Hello, {{ Auth::user()->name }}! This is your dashboard page.</p>
    </div>
@endsection
