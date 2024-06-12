<!DOCTYPE html>
<html>
<head>
    <title>Create New Tour</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.tours.view') }}">Manage Tours</a></li>
                    <li><a href="{{ route('admin.tours.create') }}">Create Tour</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Create New Tour</h2>

            <form action="{{ route('admin.tours.store') }}" method="POST">
                @csrf
                <div>
                    <label for="idTour">Tour ID</label>
                    <input type="text" id="idTour" name="idTour" required>
                </div>

                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ $description }}</textarea>
                </div>
                <div>
                    <label for="startDay">Start Day</label>
                    <input type="date" id="startDay" name="startDay">
                </div>

                <div>
                    <label for="endDay">End Day</label>
                    <input type="date" id="endDay" name="endDay">
                </div>

                <div>
                    <label for="cost">Cost</label>
                    <input type="text" id="cost" name="cost">
                </div>

                <div>
                    <label for="idAddress">Address ID</label>
                    <input type="text" id="idAddress" name="idAddress">
                </div>

                <div>
                    <label for="idHotel">Hotel ID</label>
                    <input type="text" id="idHotel" name="idHotel">
                </div>

                <div>
                    <label for="idVehicle">Vehicle ID</label>
                    <input type="text" id="idVehicle" name="idVehicle">
                </div>

                <div>
                    <label for="idTourGuide">Tour Guide ID</label>
                    <input type="text" id="idTourGuide" name="idTourGuide">
                </div>

                <button type="submit">Create Tour</button>
            </form>
        </main>
    </div>
</body>
</html>