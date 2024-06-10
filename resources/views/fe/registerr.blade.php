<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <script src="{{ asset('assets/js/registerr.js') }}"></script> -->
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
</html>
