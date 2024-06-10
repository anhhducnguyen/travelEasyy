

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login-Form</title>
</head>

<body>
    <header id="header">
        <div class="logo"><a href="">Travel Easy</a> </div>
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
                    <li>
                        <a href="" class="navlogin">Login</a>
                    </li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Welcome</h1>
                <p>Please login to continue......</p>
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
                        <label for="password">Enter Password</span></label>
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
                        <a href="#">Forgot password?</a>
                    </div>

                    <div class="bg-grey">
                        <div class="sing-up">Don't have an account? <a href="{{ route('register') }}"class="text-link" id="sign-up" >Sign up</a></div>
                    </div>
    
                    <button type="submit">LogIn</button>
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
        <div class="login-right">
            <img src="{{asset('assets/images/travel_logo.jpg')}}">
        </div>
    </div>

    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        let eyeOpenUrl = "{{ asset('assets/images/eye-open.png') }}";
        let eyeCloseUrl = "{{ asset('assets/images/eye-close.png') }}";

        eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src = eyeOpenUrl;
            } else {
                password.type = "password";
                eyeicon.src = eyeCloseUrl;
            }
        }
    </script>

    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>