<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Change Password</title>
</head>

<body>
    <header id="header">
        <div class="logo"><a href="{{ route('index') }}">Travel Easy</a> </div>
        <div class="hamburger" id="toggle">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar" id="navbar">
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a href="#product">Products</a>
                </li>
                <li>
                    <a href="#about">About Us</a>
                </li>
                <li>
                    <a href="{{route('account')}}">Edit profile</a>
                </li>
                <div class="login" id="login">
                    <li><a href="{{route('logout_up')}}" class="navlogin">Logout</a></li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Change Password</h1>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{ route('password.update') }}" method="POST" id="registerForm" class="login-form" autocomplete="off">
            @csrf
            <div>
                <label for="current_password">Current Password:</label>
                <input type="password" name="current_password" required>
            </div>
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" required>
            </div>
            <div>
                <label for="new_password_confirmation">Confirm New Password:</label>
                <input type="password" name="new_password_confirmation" required>
            </div>
            
            <div class="login-footer">      
                <button type="submit">Change Password</button>
            </div>
        </form>
        </div>
        <div class="login-right">
        </div>
    </div>

    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>
