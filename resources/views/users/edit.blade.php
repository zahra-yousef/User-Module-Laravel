@extends('layouts.app')
@section('content')
    <div class="wrapper create-user">
        <h1>Edit User Info</h1>
        <form action="{{ route('users.update',  $user_info->id) }}" method="POST"> 
            @csrf
            @method('PUT')
            <label for="name">User name:</label>
            <input type="text"
                name="name" 
                id="name" 
                value="{{ $user_info->name }}" 
                class="form-control is-valid @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            <label for="email">User email:</label>
            <input type="email" 
                name="email" 
                id="email" 
                value="{{ $user_info->email }}" 
                class="form-control is-valid @error('email') is-invalid @enderror">
            @error('email')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            
            <label for="password">User password:</label>
            <input type="password" 
                name="password" 
                id="password" 
                class="form-control is-valid @error('password') is-invalid @enderror">
            @error('password')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

            <label for="role">user type:</label>
            <select name="role" 
                id="role" 
                class="form-control is-valid @error('role') is-invalid @enderror">
                <option value="">Role</option>
                <option value="admin" {{ ($user_info->role == 'admin') ? 'selected' : '' }} >Admin</option>
                <option value="user" {{ ($user_info->role == 'user') ? 'selected' : '' }}>Normal user</option>
            </select>
            @error('role')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

            <input type="submit" value="Update User Info">
        </form>
    </div>
    <a href="{{ route('users.index') }}" class="back"><i class="fa-solid fa-arrow-left"></i> Back to all users</a>                  
@endsection