<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Customer Accounts</h1>
    @if(Auth::check())
        <p>Name:</p>
        <input type="text" id="name" value="{{ Auth::user()->name }}" readonly>
        
        <p>Email:</p>
        <input type="email" id="email" value="{{ Auth::user()->email }}" readonly>
        
        <p>Created_at:</p>
        <input type="tel" id="phone" value="{{ Auth::user()->created_at }}" readonly>
    @else
        <a href="{{route('login')}}" id="login"></a>
    @endif
    <a href="{{route('logout_up')}}" id="a_logout">Logout</a>
        

</body>
</html>