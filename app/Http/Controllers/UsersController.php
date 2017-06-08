<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'employee');
        })->get();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $user = New User;
        $user->password = bcrypt($request['password']);
        $user->initials = $request['initials'];
        $user->insertion = $request['insertion'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->address = $request['address'];
        $user->postal_code = $request['postal_code'];
        $user->residence = $request['residence'];
        $user->save();
        $user->attachRole(1);
        return redirect('users');
    }

    public function edit($id){
        $user = User::findorfail($id);
        return view('users.edit', compact('user'));
    }

    public function self(){
        $user = User::FindorFail(Auth::user()->id);
        return view('users.self_form', compact('user'));
    }

    public function selfupdate(Request $request, $id){
        $user = User::FindorFail($id);
        if($request['password'] != ""){
            $user->password = bcrypt($request['password']);
        }

        $user->initials = $request['initials'];
        $user->insertion = $request['insertion'];
        $user->surname = $request['surname'];
        $user->email = $request['email'];
        $user->address = $request['address'];
        $user->postal_code = $request['postal_code'];
        $user->residence = $request['residence'];
        $user->update();
        return redirect('/');

    }

    public function destroy($id){
        $user = User::findorfail($id);
        $user->delete();
        return redirect('users');
    }
}
