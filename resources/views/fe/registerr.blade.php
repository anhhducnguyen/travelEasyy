<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="modal-body">
        <form id="registerForm" action="/store" method="POST">
            @csrf
            <div class="modal-body-p">
                <p class="modal-body-p1">Full name</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="text" id="name" name="name" required><br>
            <div class="modal-body-p">
                <p class="modal-body-p1">Email address</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="email" id="email" name="email" required><br>
            <div class="modal-body-p">
                <p class="modal-body-p1">Password</p>
                <span>required</span>
            </div>
            <input class="modal-body-name" type="password" id="password" name="password" required><br>
            <button type="submit">Submit</button>
            <div class="modal-footer">
                 <p>By providing your email & phone number you agree to direct marketing, including SMS. Consent is not a condition to purchase. You can unsubscribe any time.</p>
            </div>
        </form>
    </div>
</body>
</html>