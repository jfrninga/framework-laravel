<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {

        return view("users.index", ['users' => User::all()]);
    }


    public function create()
    {
        return view("users.create");
    }


    public function store(StorePostRequest $request)
    {
        $input = $request->safe()->only(['name', 'email', 'password', 'avatar_url']);
        // $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect()->route('users.index');

//        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }


    public function edit(User $user)
    {
//        echo view('users.show', ['user' => $user]);

        return view('users.edit', ['user' => $user]);
    }


    public function update(UpdateUserRequest $request, User $user)
    {

        // ça te permet de modifier un utilisateur en tant que admin
        if (Auth::user()->is_admin){
            $input = $request->only(['name', 'email', 'is_admin', 'avatar_url']);
        } else {
            $input = $request->only(['name', 'email', 'avatar_url']);
        }

        $user->update($input);

        if (Auth::user()->is_admin){
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index');
        }



//        $input = $request->safe()->only(['name', 'email', 'avatar_url']);
//        $user->update($input);
//        return redirect()->route('users.show', $user);
    }


    public function destroy(User $user)
    {

        if (Auth::user() == $user){
            $user->delete();
        } else {
            return redirect()->back()->with('not-allowed', 'No access try another page');
        }

        return redirect()->route('auth.login');


//        $user->delete();
//        return redirect()->route('auth.register');
    }
}
