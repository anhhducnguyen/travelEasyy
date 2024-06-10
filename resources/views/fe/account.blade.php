<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin tài khoản</h1>
    @if(Auth::check())
        <p>Mã tài khoản</p>
        <input type="text" id="id_account" value="{{ Auth::user()->id }}" readonly>

        <p>Họ và tên</p>
        <input type="text" id="name" value="{{ Auth::user()->name }}" readonly>
        
        <p>Email</p>
        <input type="email" id="email" value="{{ Auth::user()->email }}" readonly>
        
        <p>Created_at:</p>
        <input type="tel" value="{{ Auth::user()->created_at }}" readonly>
    @else
        <a href="{{route('login')}}" id="login"></a>
    @endif
    <button><a href="{{route('logout_up')}}" id="a_logout">Đăng xuất</a></button>
    <a href="{{ route('index') }}" class="container-right-btn1">
        Trang chủ
    </a>
        

</body>
</html>