<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <form action="/customers" method="POST">
        @csrf
        <label for="idCustomer">ID Customer:</label>
        <input type="text" id="idCustomer" name="idCustomer"><br>

        <label for="idAddress">ID Address:</label>
        <input type="text" id="idAddress" name="idAddress"><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>

        <button type="submit">Add Customer</button>
    </form>
</body>
</html>
