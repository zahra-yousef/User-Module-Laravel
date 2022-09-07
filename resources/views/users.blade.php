@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            List of Users 
        </div>
        <p>{{ $url_name }}</p>

        @foreach ($users_info as $user_info)
            @if ($user_info['email'] != 'z@hotmail.com')
                <div>{{ $loop->index }} - {{ $user_info['name'] }} - {{ $user_info['email'] }} - {{ $user_info['role'] }}</div>
            @endif
        @endforeach
    </div>
</div>