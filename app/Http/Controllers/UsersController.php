<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        //get all users details from db and order them by role
        $users_info = User::orderBy('role')->get();

        return view('users.index', [
             'users_info' => $users_info,
         ]);
    }

    public function show($id){
        //get single user from db
        $user_info = User::findOrFail($id);
        return view('users.show', ['user_info' => $user_info]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        //create instance of user model
        $user =  User::create($validatedData);
        
        //save data into db
        $user->save();

        return redirect('/users')->with('msg','New user added successfully!');
    }

    public function destroy($id){
        //search for the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('msg','User deleted successfully!');
    }
}
