<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Customer Accounts</h1>
    <ul>
        <li>Name: {{ $customers->name }}</li>
        <li>Email: {{ $customers->email }}</li>
        <li>Phone: {{ $customers->phone }}</li>
    </ul>
    <form action="/logout" method="POST">
        @csrf
        <!-- Các trường nhập dữ liệu của người dùng -->
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>