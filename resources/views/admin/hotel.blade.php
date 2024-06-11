<!-- resources/views/hotels/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Hotels List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Hotels List</h2>
    <a href="{{ route('addHotel') }}" class="btn btn-success mb-2">Add New Hotel</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Hotel</th>
                <th>ID Address</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->idHotel }}</td>
                    <td>{{ $hotel->idAddress }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->created_at }}</td>
                    <td>{{ $hotel->updated_at }}</td>
                    <td><a href="#">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                    <td><a href="#">View Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
