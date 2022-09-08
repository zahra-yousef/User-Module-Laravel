@extends('layouts.app')
@section('content')
    <div class="wrapper create-user">
        <h1>Add a New User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <label for="name">Enter user name:</label>
            <input type="text"
                name="name" 
                id="name" 
                value="{{Request::old('name')}}" 
                class="form-control is-valid @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <label for="email">Enter user email:</label>
            <input type="email" 
                name="email" 
                id="email" 
                value="{{Request::old('email')}}" 
                class="form-control is-valid @error('email') is-invalid @enderror">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            
            <label for="password">Enter user password:</label>
            <input type="password" 
                name="password" 
                id="password" 
                class="form-control is-valid @error('password') is-invalid @enderror">
            @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

            <label for="role">Choose type of user:</label>
            <select name="role" 
                id="role" 
                class="form-control is-valid @error('role') is-invalid @enderror">
                <option value="">Role</option>
                <option value="admin">Admin</option>
                <option value="user">Normal user</option>
            </select>
            @error('role')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

            <input type="submit" value="Add User">
        </form>
    </div>
@endsection