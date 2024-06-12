<!DOCTYPE html>
<html>
<head>
    <title>Create New Vehicle</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body>
    <div class="container">
        <h1>Create New Vehicle</h1>
        <form action="{{ route('admin.vehicles.store') }}" method="POST">
            @csrf
            <div>
                <label for="idVehicle">Vehicle ID</label>
                <input type="text" id="idVehicle" name="idVehicle" required>
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="licensePlate">License Plate</label>
                <input type="text" id="licensePlate" name="licensePlate">
            </div>
            <button type="submit">Create Vehicle</button>
        </form>
    </div>
</body>
</html>
