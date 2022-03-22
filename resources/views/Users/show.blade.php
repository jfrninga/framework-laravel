@extends('layout')

@section('content')
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->email }}</h2>
    <h2>{{ $user->password }}</h2>
    <h2>{{ $user->avatar_url }}</h2>
    <a href="{{route('users.edit', $user)}}">Editer l'utilisateur</a>

    <form action="{{route('users.destroy', $user)}}" method="POST">
        @method('DELETE')
        @csrf
        <button>Supprimer l'utilisateur</button>
    </form>
@endsection
