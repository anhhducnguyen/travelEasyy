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
    </ul>
</body>
</html>