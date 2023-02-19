@extends('layouts.app')

@section('content')
    <h1>My Connections</h1>
    <ul>
        @foreach($connections as $connection)
            <li>
                <a href="{{ route('profile.show', $connection->user) }}">{{ $connection->user->name }}</a>
                <form action="{{ route('connections.remove', $connection) }}" method="POST">
                    @csrf
                    <button type="submit">Remove Connection</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
