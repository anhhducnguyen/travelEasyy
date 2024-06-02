<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
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
                <button type="submit">Submit</button> 
            </form>
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