@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Profile</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <a href="{{ route('user.edit_profile') }}" class="btn btn-primary">Edit Profile</a>
    </div>
@endsection
