@extends('layouts.app')
@section('content')
    <div class="wrapper user-index">
        <h1>List of Users</h1>
        @if(session('msg') !== null)
            <div class="msg alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
            </div>
        @endif
        <a href="{{ route('users.create') }}">
            <button type="button" class="btn btn-primary text-white">
                <i class="fa-solid fa-plus"></i>Add New User
            </button>  
        </a><br /><br />
        @foreach ($users_info as $user_info)
            <div class="user-item">
                <img src="/img/user.png" alt="user icon">
                <h4><a href="{{ route('users.show',$user_info->id) }}">{{ $user_info['name'] }}</a></h4> 
                <h4>
                    <a href="{{ route('users.edit',$user_info->id) }}">
                        <button class = "btn btn-success text-white">
                            <i class="fa-solid fa-pencil"></i>Edit
                        </button>
                    </a>
                </h4>
                <h4>
                    <form action="{{ route('users.destroy', $user_info->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class = "btn btn-danger text-white">
                            <i class="fa-solid fa-trash"></i>Delete
                        </button>
                    </form>
                </h4>
            </div>
    @endforeach
    </div>
@endsection