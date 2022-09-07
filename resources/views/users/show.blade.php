@extends('layouts.app')
@section('content')
    <div class = "wrapper user-details" >
        <h1> User Details:</h1>
        <p class="type">Name - {{ $user_info->name }}</p>
        <p class="type">Email - {{ $user_info->email }}</p>
        <p class="base">Role - {{ $user_info->role }}</p>

        <form action="{{ route('users.destroy', $user_info->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete {{ $user_info->name }} account</button>
        </form>
    </div> 
    <a href="/users" class="back">Back to all users</a>                  
@endsection