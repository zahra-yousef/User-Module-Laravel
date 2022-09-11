@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <img src="/img/users.png" alt="users logo">
        <div class="title m-b-md">
            User Module System
        </div>
        <a href="{{ route('users.index') }}">
            <button type="button" class="btn btn-warning btn-lg text-white">
                <i class="fa fa-user" aria-hidden="true"></i> Show Users
            </button>
        </a>
    </div>
</div>
@endsection