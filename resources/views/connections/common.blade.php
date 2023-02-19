@extends('layouts.app')

@section('content')
    <h1>Common Connections with {{ $user->name }}</h1>
    <ul>
        @foreach($commonConnections as $connection)
            <li>
                <a href="{{ route('profile.show', $connection->user) }}">{{ $connection->user->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
