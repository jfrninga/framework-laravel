@extends('layout')

@section('content')

    <div class="container">
        <h1>Add new user</h1>

        <form action="{{route('users.store')}}" method="POST" class="my-3">
            @csrf
            <div class="form-row">
                <div class="text my-3 col">
                    <label class="form-label" for="name">Name :</label>
                    <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control @error('name')is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="text my-3 col">
                    <label class="form-label" for="email">Email :</label>
                    <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control @error('email')is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="text my-3 col">
                    <label class="form-label" for="password">Password :</label>
                    <input type="password" id="password" value="{{old('password')}}" name="password" class="form-control @error('password')is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

{{--                <div class="text my-3 col">--}}
{{--                    <label class="form-label" for="password">Confirmer Mot de passe :</label>--}}
{{--                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">--}}
{{--                </div>--}}
            </div>
            <div class="text my-3">
                <label for="avatar_url">Profile :</label>
                <input type="text" id="avatar_url" name="avatar_url" class="form-control">
            </div>
            <input class="btn btn-primary" type="submit" id="submit" value="create user">
        </form>
    </div>

@endsection
