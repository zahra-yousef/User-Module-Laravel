<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function store(){
        //create instance of user model
        $user = new User();

        //request single data from url and assign it to proper table's column 
        $user->name = request('name');
        $user->email = request('email');
        $user->role = request('role');
        $user->password = md5('test1234');

        //save data into db
        $user->save();

        ini_set("log_errors", 1); // Enable error logging
        ini_set("error_log", "/tmp/php-error.log"); // set error path
        error_log($user);

        return redirect('/users')->with('msg','New user added successfully!');
    }

    public function destroy($id){
        //search for the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('msg','User deleted successfully!');
    }
}
