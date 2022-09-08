@extends('layouts.app')
@section('content')
    <div class="wrapper user-index">
        <h1>List of Users</h1>
        <p class="msg">{{ session('msg') }}</p>
        @foreach ($users_info as $user_info)
            @if ($user_info['email'] != 'z@hotmail.com')
                <div class="user-item">
                    <img src="/img/user.png" alt="user icon">
                    <h4><a href="{{ route('users.show',$user_info->id) }}">{{ $user_info['name'] }}</a></h4> 
                    <h4 class="float-right"><a href="{{ route('users.edit',$user_info->id) }}"><i class="fa-solid fa-pencil"></i>Edit</a></h4>
                </div>
            @endif
        @endforeach
    </div>
@endsection