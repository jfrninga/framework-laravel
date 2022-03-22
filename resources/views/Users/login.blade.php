@extends('layout')

@section('content')

    <div class="container">
        <h1>Se connecter</h1>

        <form action="{{route()}}" method="POST" class="my-3">
            @csrf

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
                    <label class="form-label" for="password">Mot de passe :</label>
                    <input type="password" id="password" value="{{old('password')}}" name="password" class="form-control @error('password')is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            <input class="btn btn-primary" type="submit" id="submit" value="login">
        </form>
    </div>

@endsection
