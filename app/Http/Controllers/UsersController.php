<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(){
        // Get all users details from db and order them by role
        $users_info = User::orderBy('role')->get();

        return view('users.index', [
             'users_info' => $users_info,
         ]);
    }

    public function show($id){
        // Get single user from db
        $user_info = User::findOrFail($id);
        return view('users.show', ['user_info' => $user_info]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        // Validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // If validation fails go back to pre page 
        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validatedData = $validator->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create instance of user model
        $user =  User::create($validatedData);

        // Save data into db
        $user->save();

        return redirect('/users')->with('msg','New user added successfully!');
    }

    public function destroy($id){
        // Search for the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('msg','User deleted successfully!');
    }

    public function edit($id)
    {
        // Get single user from db
        $user_info = User::findOrFail($id);
        return view('users.edit', ['user_info' => $user_info]);
    }

    public function update(Request $request, $id)
    {
          // Validate data
          $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'min:6|nullable',
            'role' => 'required',
        ]);

        // If validation fails go back to pre page 
        if ($validator->fails()) {
            return redirect('users/users/edit/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        // Retrieve the validated input...
        $validatedData = $validator->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        
        $user = User::findOrFail($id);
        $user->update($validatedData);
        
        return redirect('/users')->with('msg','User Updated Successfully!');
    }
}
