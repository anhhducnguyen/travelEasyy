<!-- resources/views/hotels/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add New Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Add New Hotel</h2>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idHotel">ID Hotel</label>
            <input type="number" class="form-control" id="idHotel" name="idHotel" required>
        </div>
        <div class="form-group">
            <label for="idAddress">ID Address</label>
            <input type="number" class="form-control" id="idAddress" name="idAddress" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Hotel</button>
    </form>
</div>
</body>
</html>
