@extends('admin.layouts.app')

@section('content')

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Vehicle</h4>
                <form action="{{ route('admin.vehicles.update', $vehicle->idVehicle) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $vehicle->name }}">
                    </div>

                    <div class="form-group">
                        <label for="licensePlate">License Plate</label>
                        <input type="text" class="form-control" id="licensePlate" name="licensePlate" value="{{ $vehicle->licensePlate }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                </form>
            </div>
        </div>
    </div>
@endsection
