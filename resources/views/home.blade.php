@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="user-info-title">Welcome {{ Auth::user()->name }}</h4>
                    <p class="type">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Email: {{ Auth::user()->email }}
                    </p>
                    <p class="base">
                        <i class="fa fa-cog" aria-hidden="true"></i> Role: {{ Auth::user()->role }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
