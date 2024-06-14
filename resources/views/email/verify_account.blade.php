<!-- <h3>Hi: {{ $account->name}}</h3>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium accusantium sit quia deleniti qui nostrum vitae mollitia ullam officiis. Laboriosam rem beatae excepturi, praesentium corrupti accusantium. Recusandae, eius! Doloremque, aliquid.</p>


<p>
    <a href="{{ route('account.verify', $account->email) }}">Click</a>
</p> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Xác Nhận Đăng Ký Tài Khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h3 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: left;
        }
        a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        .signature {
            margin-top: 40px;
            color: #333;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Xác Nhận Đăng Ký Tài Khoản</h3>
        
        <p>
            Xin chào: <strong>{{ $account->name }}</strong>,
        </p>

        <p>
            Chúng tôi đã nhận được yêu cầu đăng ký tài khoản của bạn trên Travel Easy. Vui lòng xác nhận địa chỉ email của bạn bằng cách nhấn vào nút bên dưới:
        </p>

        <p>
            <a href="{{ route('account.verify', $account->email) }}">Xác nhận địa chỉ email</a>
        </p>

        <p class="signature">
            Trân trọng,<br>
            Đội ngũ Travel Easy
        </p>
    </div>
</body>
</html>
