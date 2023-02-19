@extends('layouts.app')

@section('content')
    <h1>Received Connection Requests</h1>
    <ul>
        @foreach($receivedRequests as $connection)
            <li>
                <a href="{{ route('profile.show', $connection->sender) }}">{{ $connection->sender->name }}</a>
                <form action="{{ route('requests.accept', $connection) }}" method="POST">
                    @csrf
                    <button type="submit">Accept</button>
                </form>
                <form action="{{ route('requests.withdraw', $connection) }}" method="POST">
                    @csrf
                    <button type="submit">Withdraw Request</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
