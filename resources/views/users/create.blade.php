@extends('layouts.app')
@section('content')
    <div class="wrapper create-user">
        <h1>Add a New User</h1>
        <form action="/users" method="POST">
            @csrf
            <label for="name">Enter user name:</label>
            <input type="text" name="name" id="name" required>
            
            <label for="email">Enter user email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="role">Choose type of user:</label>
            <select name="role" id="role">
                <option value="admin">Admin</option>
                <option value="user">Normal user</option>
            </select>
            <input type="submit" value="Add User">
        </form>
    </div>
@endsection