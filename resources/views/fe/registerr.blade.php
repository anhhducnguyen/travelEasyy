<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="{{ asset('assets/js/registerr.js') }}"></script>
</head>
<body>
    <h1>Đăng ký tài khoản</h1>
    <div class="modal-body">
        <form id="registerForm" action="/store" method="POST" onsubmit="validateForm(event)">
            @csrf
            <div class="modal-body-p">
                <p class="modal-body-p1">Họ và tên</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="text" id="name" name="name" required><br>
            <div class="modal-body-p">
                <p class="modal-body-p1">Địa chỉ Email</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="email" id="email" name="email" required><br>
            <div class="modal-body-p">
                <p class="modal-body-p1">Mật khẩu</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="password" id="password" name="password" required><br>
            <div class="modal-body-p">
                <p class="modal-body-p1">Xác nhận mật khẩu</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="password" id="confirmPassword" name="confirmPassword" required><br>
            <p>Mật khẩu tối thiểu 8 ký tự</p>
            <p>Mật khẩu phải bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số</p>
            <p></p>
            <button type="submit">Đăng ký</button>

            <button><a href="{{ route('login') }}" class="container-right-btn1">Đăng nhập</a></button>
            <a href="{{ route('index') }}" class="container-right-btn1">
                Trang chủ
            </a>
        </form>
    </div>
</body>
</html> -->











<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Register</title>
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
                <p>Please register to continue......</p>
            </div>
            <form action="/store" method="POST" id="registerForm" class="login-form" autocomplete="off" onsubmit="validateForm(event)">
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
                        <label for="text">Full name</label>
                        <input type="text" id="name" name="name" required placeholder="John Mank">
                    </div>
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
                        <label for="password">Confirm Password</span></label>
                        <label for="text"></label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter your Password" required class="pass-key">  
                        <img src="{{asset('assets/images/eye-close.png')}}" id="eyeicon" class="password-toggle">
                    </div>

                    <div class="bg-grey">
                        <div class="sing-up">Do you have an account? <a href="{{ route('login') }}"class="text-link" id="sign-up" >Login</a></div>
                    </div>
    
                    <button type="submit">register</button>
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
            <img style="height:700px; width: 650px" src="{{asset('assets/images/travel_s3.jpg')}}" alt="">
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
