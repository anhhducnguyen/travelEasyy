@extends('account.layouts.app')

@section('title', 'Forgot Password')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
@endsection

@section('content')
    <div class="container" id="home">
        <div class="login-left">
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('account.check-forgot-password') }}" method="POST" id="registerForm" class="login-form" autocomplete="off">
        <div>
            @if ($message = Session::get('success'))
                <div class="success-message">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required placeholder="example@email.com">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="login-footer">
            <button type="submit">Send mail</button>
        </div>
        </div>
        <div class="login-right">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection
