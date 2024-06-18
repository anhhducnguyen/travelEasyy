

@extends('account.layouts.app')

@section('title', 'Login')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
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

        <form action="{{ route('check_reset_password', ['token' => $token]) }}" method="POST" id="registerForm" class="login-form" autocomplete="off">   
        <div>
            @if ($message = Session::get('success'))
                <div class="success-message">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
        @csrf
        <div class="login-content">
                    <div class="form-item">
                        <label for="text">Enter Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your Password" required class="pass-key">  
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-item">
                        <label for="email">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your Password" required class="pass-key">  
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit">Change Pass</button>
                </div>
        </div>
        <div class="login-right">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection

