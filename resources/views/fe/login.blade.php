<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Đăng nhập tài khoản</h1>
    <form action="/storeLogin" method="POST" id="loginForm">
        @csrf
        <div class="modal-body-p">
            <p class="modal-body-p1">Địa chỉ Email</p>
            <span>required</span>
        </div>
        <input class="modal-body-name" type="email" name="email" required>
        <div class="modal-body-p">
            <p class="modal-body-p1">Mật khẩu</p>
            <span>required</span>
        </div>
        <input class="modal-body-name" type="password" name="password" required>   
        <button type="submit">Đăng nhập</button> 
        <button><a href="{{ route('register') }}" class="container-right-btn1">Tôi chưa có tài khoản</a></button>
    </form>
    <a href="{{ route('auth.google') }}" class="container-right-btn1">
            Tiếp tục với google
    </a>
    <a href="{{ route('index') }}" class="container-right-btn1">
        Quên mật khẩu
    </a>
    <a href="{{ route('index') }}" class="container-right-btn1">
        Trang chủ
    </a>
    <div>
        @if ($message = Session::get('error'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
</body>
</html> -->






































































<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login</title>
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

</html> -->


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
    <title>Login</title>
    <style>
        .sk-fading-circle {
            margin: 100px auto;
            width: 40px;
            height: 40px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .sk-fading-circle .sk-circle {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
        }

        .sk-fading-circle .sk-circle:before {
            content: '';
            display: block;
            margin: 0 auto;
            width: 15%;
            height: 15%;
            background-color: #3498db;
            border-radius: 100%;
            -webkit-animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
                    animation: sk-circleFadeDelay 1.2s infinite ease-in-out both;
        }

        .sk-fading-circle .sk-circle2 {
            -webkit-transform: rotate(30deg);
                -ms-transform: rotate(30deg);
                    transform: rotate(30deg);
        }
        .sk-fading-circle .sk-circle3 {
            -webkit-transform: rotate(60deg);
                -ms-transform: rotate(60deg);
                    transform: rotate(60deg);
        }
        .sk-fading-circle .sk-circle4 {
            -webkit-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                    transform: rotate(90deg);
        }
        .sk-fading-circle .sk-circle5 {
            -webkit-transform: rotate(120deg);
                -ms-transform: rotate(120deg);
                    transform: rotate(120deg);
        }
        .sk-fading-circle .sk-circle6 {
            -webkit-transform: rotate(150deg);
                -ms-transform: rotate(150deg);
                    transform: rotate(150deg);
        }
        .sk-fading-circle .sk-circle7 {
            -webkit-transform: rotate(180deg);
                -ms-transform: rotate(180deg);
                    transform: rotate(180deg);
        }
        .sk-fading-circle .sk-circle8 {
            -webkit-transform: rotate(210deg);
                -ms-transform: rotate(210deg);
                    transform: rotate(210deg);
        }
        .sk-fading-circle .sk-circle9 {
            -webkit-transform: rotate(240deg);
                -ms-transform: rotate(240deg);
                    transform: rotate(240deg);
        }
        .sk-fading-circle .sk-circle10 {
            -webkit-transform: rotate(270deg);
                -ms-transform: rotate(270deg);
                    transform: rotate(270deg);
        }
        .sk-fading-circle .sk-circle11 {
            -webkit-transform: rotate(300deg);
                -ms-transform: rotate(300deg);
                    transform: rotate(300deg);
        }
        .sk-fading-circle .sk-circle12 {
            -webkit-transform: rotate(330deg);
                -ms-transform: rotate(330deg);
                    transform: rotate(330deg);
        }
        .sk-fading-circle .sk-circle2:before {
            -webkit-animation-delay: -1.1s;
                    animation-delay: -1.1s;
        }
        .sk-fading-circle .sk-circle3:before {
            -webkit-animation-delay: -1s;
                    animation-delay: -1s;
        }
        .sk-fading-circle .sk-circle4:before {
            -webkit-animation-delay: -0.9s;
                    animation-delay: -0.9s;
        }
        .sk-fading-circle .sk-circle5:before {
            -webkit-animation-delay: -0.8s;
                    animation-delay: -0.8s;
        }
        .sk-fading-circle .sk-circle6:before {
            -webkit-animation-delay: -0.7s;
                    animation-delay: -0.7s;
        }
        .sk-fading-circle .sk-circle7:before {
            -webkit-animation-delay: -0.6s;
                    animation-delay: -0.6s;
        }
        .sk-fading-circle .sk-circle8:before {
            -webkit-animation-delay: -0.5s;
                    animation-delay: -0.5s;
        }
        .sk-fading-circle .sk-circle9:before {
            -webkit-animation-delay: -0.4s;
                    animation-delay: -0.4s;
        }
        .sk-fading-circle .sk-circle10:before {
            -webkit-animation-delay: -0.3s;
                    animation-delay: -0.3s;
        }
        .sk-fading-circle .sk-circle11:before {
            -webkit-animation-delay: -0.2s;
                    animation-delay: -0.2s;
        }
        .sk-fading-circle .sk-circle12:before {
            -webkit-animation-delay: -0.1s;
                    animation-delay: -0.1s;
        }

        @-webkit-keyframes sk-circleFadeDelay {
            0%, 39%, 100% { opacity: 0; }
            40% { opacity: 1; }
        }

        @keyframes sk-circleFadeDelay {
            0%, 39%, 100% { opacity: 0; }
            40% { opacity: 1; }
        }

        .hidden {
            display: none !important;
        }

        .body-loading {
            position: relative;
        }
    </style>
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
                        <a href="#">Forgot password?</a>
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
        <div class="login-right">
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

        document.getElementById('loginButton').addEventListener('click', function(event) {
            event.preventDefault(); 

            document.body.classList.add('body-loading');
            document.querySelector('.container').classList.add('hidden');
            document.getElementById('loadingSpinner').style.display = 'block';

            setTimeout(function() {
                document.getElementById('loginForm').submit();
            }, 500);
        });
    </script>
</body>

</html>