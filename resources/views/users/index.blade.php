@extends('layouts.app')
@section('content')
    <div class="wrapper pizza-index">
        <h1>List of Users</h1>
        <p class="msg">{{ session('msg') }}</p>
        @foreach ($users_info as $user_info)
            @if ($user_info['email'] != 'z@hotmail.com')
                <div class="pizza-item">
                    <img src="/img/user.png" alt="user icon">
                    <h4><a href="/users/{{ $user_info->id }}">{{ $user_info['name'] }}</a></h4> 
                </div>
            @endif
        @endforeach
    </div>
@endsection