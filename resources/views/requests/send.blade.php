@extends('layouts.app')

@section('content')
    <h1>Sent Connection Requests</h1>
    <ul>
        @foreach($sentRequests as $connection)
            <li>
                <a href="{{ route('profile.show', $connection->receiver) }}">{{ $connection->receiver->name }}</a>
                <form action="{{ route('requests.withdraw', $connection) }}" method="POST">
                    @csrf
                    <button type="submit">Withdraw Request</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
