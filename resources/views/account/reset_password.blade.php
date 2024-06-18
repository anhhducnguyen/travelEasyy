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
    <link rel="shortcut icon" href="{{asset('assets/images/logo_web.ico')}}" type="image/x-icon">
    <title>Forgot Password</title>
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
                    <a href="#contact">Contact</a>
                </li>
                <div class="login" id="login">
                    <li><a href="{{route('loginn')}}" class="navlogin">Login</a></li>
                </div>
            </ul>
        </nav>
    </header>
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

    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>

