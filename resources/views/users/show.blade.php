@extends('layouts.app')
@section('content')
    <div class = "wrapper user-details" >
        <h1> User Details:</h1>
        <p class="type">Name - {{ $user_info->name }}</p>
        <p class="type">Email - {{ $user_info->email }}</p>
        <p class="base">Role - {{ $user_info->role }}</p>
    </div> 
    <a href="{{ route('users.index') }}" class="back"><i class="fa-solid fa-arrow-left"></i> Back to all users</a>                  
@endsection