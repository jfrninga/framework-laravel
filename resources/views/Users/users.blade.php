<ul>
    @foreach($users as $user)
        <li> <img src="{{$user->avatar_url}}" width="30px" height="40px" alt="avatar"> {{$user->name}} ({{$user->email}})</li>
    @endforeach
</ul>
