<!DOCTYPE html>
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
                <p class="modal-body-p1">Email address</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="email" name="email" required>
            <div class="modal-body-p">
                <p class="modal-body-p1">Password</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="password" name="password" required>   
            <button type="submit">Đăng nhập</button> 
            <button><a href="{{ route('register') }}" class="container-right-btn1">Đăng ký</a></button>
        </form>
        <a href="{{ route('auth.google') }}" class="container-right-btn1">
                Continue with Google
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
</html>