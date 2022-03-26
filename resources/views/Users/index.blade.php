@extends('layout')

@section('content')

    <div class="container my-4">
        <h1>Liste des utilisateurs</h1>

        <ul>
            @foreach($users as $user)
                <li>
                    <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                    <div class="bottom">
                        {{ $user->name }} <br>
                        {{ $user->email }} <br>
                        <button type="button" class="btn btn-info mb-3"><a href="{{route('users.show', $user)}}">Voir plus</a></button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
