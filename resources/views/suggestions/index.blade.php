@extends('layouts.app')

@section('content')
    <h1>Suggestions</h1>
    <ul>
        @foreach($suggestions as $user)
            <li>
                <a href="{{ route('profile.show', $user) }}">{{ $user->name }}</a>
                <form action="{{ route('suggestions.connect', $user) }}" method="POST">
                    @csrf
                    <button type="submit">Connect</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
