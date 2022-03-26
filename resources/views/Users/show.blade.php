@extends('layout')

@section('content')


    <div class="my-4">

        <div class="pl-2">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->email }}</h2>

            <div class="my-4">
                <a href="<?= url('/users'); ?>" title="">Retour à la liste</a>
            </div>

            @if(Auth::user() == $user || Auth::user()->is_admin)
                <div class="bottom d-flex align-items-center justify-content-between">
                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning my-1">Modifier l'utilisateur</a>
                </div>
            @endif

            @if((Auth::user()->is_admin && Auth::user() != $user) || (!Auth::user()->is_admin && Auth::user() == $user))

                <div class="delete">
                    <form action="{{route('users.destroy', $user)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" id="destroy" name="destroy" value="Supprimer l'utilisateur"
                               class="btn btn-danger">
                    </form>
                </div>

            @endif

        </div>
    </div>












    {{--    <h1>{{ $user->name }}</h1>--}}
{{--    <h2>{{ $user->email }}</h2>--}}
{{--    <h2>{{ $user->password }}</h2>--}}
{{--    <h2>{{ $user->avatar_url }}</h2>--}}
{{--    <button type="button" class="btn btn-warning mb-3"><a href="{{route('users.edit', $user)}}">Editer l'utilisateur</a></button>--}}



{{--    <form action="{{route('users.destroy', $user)}}" method="POST">--}}
{{--        @method('DELETE')--}}
{{--        @csrf--}}
{{--        <button type="submit" class="btn btn-danger">Supprimer l'utilisateur</button>--}}
{{--    </form>--}}


@endsection
