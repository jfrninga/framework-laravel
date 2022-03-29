@extends('layout')

@section('content')

    <div class="container my-4">
        <h1>Liste des utilisateurs</h1>

        <ul>
            @foreach($users as $user)
                <li>
                    <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                    <div class="bottom">
                        <h3>{{ $user->name }}</h3> <br>
                        <h3>{{ $user->email }}</h3>  <br>
                        <button type="button" class="btn btn-info mb-3"><a href="{{route('users.show', $user)}}">view</a></button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
