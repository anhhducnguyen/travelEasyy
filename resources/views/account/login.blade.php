@extends('account.layouts.app')

@section('title', 'Login')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection

@section('content')
 <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Login</h1>
            </div>
            <form action="/storeLogin" method="POST" id="loginForm" class="login-form" autocomplete="off">
                <div>
                    @if ($message = Session::get('success'))
                        <div class="success-message">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                <div>
                    @if ($message = Session::get('error'))
                        <div class="alert alert-success alert-block error-message">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                @csrf
                <div class="login-content">
                    <div class="form-item">
                        <label for="email">Enter Email</label>
                        <input type="email" name="email" required placeholder="example@email.com">
                    </div>
                    <div class="form-item">
                        <label for="password">Enter Password</label>
                        <label for="text"></label>
                        <input type="password" name="password" id="password" placeholder="Enter your Password" required class="pass-key">  
                        <img src="{{asset('assets/images/eye-close.png')}}" id="eyeicon" class="password-toggle">
                    </div>
                    <div class="form-item">
                        <div class="checkbox">
                            <input type="checkbox" name="" id="rememberMeCheckbox" checked>
                            <label for="rememberMeCheckbox" class="checkboxlabel">Remember Me</label>
                        </div>
                    </div>
                    <div class="remember-forgot">
                        <a href="{{ route('account.forgot-password' )}}">Forgot password?</a>
                    </div>
                    <div class="bg-grey">
                        <div class="sing-up">Don't have an account? <a href="{{ route('register') }}"class="text-link" id="sign-up" >Sign up</a></div>
                    </div>
    
                    <button type="submit" id="loginButton">LogIn</button>
                </div>
                <div class="login-footer">
                    <a href="">
                        <img width="30" src="https://img.icons8.com/color/512/facebook-new.png" alt="facebook">Facebook
                    </a>
                    <a href="{{ route('auth.google') }}">
                        <img width="30" src="https://img.icons8.com/fluency/512/google-logo.png" alt="google">Google
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div id="loadingSpinner" class="sk-fading-circle">
        <div class="sk-circle1 sk-circle"></div>
        <div class="sk-circle2 sk-circle"></div>
        <div class="sk-circle3 sk-circle"></div>
        <div class="sk-circle4 sk-circle"></div>
        <div class="sk-circle5 sk-circle"></div>
        <div class="sk-circle6 sk-circle"></div>
        <div class="sk-circle7 sk-circle"></div>
        <div class="sk-circle8 sk-circle"></div>
        <div class="sk-circle9 sk-circle"></div>
        <div class="sk-circle10 sk-circle"></div>
        <div class="sk-circle11 sk-circle"></div>
        <div class="sk-circle12 sk-circle"></div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endsection

