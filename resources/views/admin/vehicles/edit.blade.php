<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
</head>
<body>
    <div class="container">
        <h1>Edit Vehicle</h1>
        <form action="{{ route('admin.vehicles.update', $vehicle->idVehicle) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="idVehicle">Vehicle ID</label>
                <input type="text" id="idVehicle" name="idVehicle" value="{{ $vehicle->idVehicle }}" readonly>
            </div>
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $vehicle->name }}">
            </div>
            <div>
                <label for="licensePlate">License Plate</label>
                <input type="text" id="licensePlate" name="licensePlate" value="{{ $vehicle->licensePlate }}">
            </div>
            <button type="submit">Update Vehicle</button>
        </form>
    </div>
</body>
</html>
