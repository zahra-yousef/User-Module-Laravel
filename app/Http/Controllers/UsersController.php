<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users_info = [
            ['name' => 'zahra', 'email' => 'z@hotmail.com', 'role' => 'admin'],
            ['name' => 'Ali', 'email' => 'ahotmail.com', 'role' => 'admin'],
            ['name' => 'Reda', 'email' => 'r@hotmail.com', 'role' => 'user']
        ];
     
         $url_name = request('name');
     
        return view('users', [
             'users_info' => $users_info,
             'url_name' => $url_name,
         ]);
    }

    public function show($id){
        return view('users_details', ['id' => $id]);
    }
}
