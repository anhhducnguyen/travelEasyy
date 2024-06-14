<!-- admin.vehicles.index.blade.php -->
@extends('admin.layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Vehicles</h4>
            <a href="{{ route('admin.vehicles.create') }}" class="btn btn-primary mb-3">Create New Vehicle</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>License Plate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->idVehicle }}</td>
                                <td>{{ $vehicle->name }}</td>
                                <td>{{ $vehicle->licensePlate }}</td>
                                <td class="table-actions">
                                    <a href="{{ route('admin.vehicles.edit', $vehicle->idVehicle) }}" class="btn btn-sm">Edit</a>
                                    <form action="{{ route('admin.vehicles.destroy', $vehicle->idVehicle) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
