<!-- admin.vehicles.create.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Vehicle</h4>
                <form id="form" action="{{ route('admin.vehicles.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                    </div>
                    <div class="form-group">
                        <label for="licensePlate">License Plate</label>
                        <input type="text" class="form-control" id="licensePlate" name="licensePlate" placeholder="License Plate" />
                    </div>  
                    <button class="btn btn-primary mr-2" type="submit">Create Vehicle</button>
                    <button class="btn btn-light" type="button" onclick="clearForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
