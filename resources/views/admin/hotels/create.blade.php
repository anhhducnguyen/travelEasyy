<!-- admin.hotels.create.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Hotel</h4>
                <form id="form" action="{{ route('admin.hotels.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" id="city" name="city" required>
                            <option value="" selected>Select City</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="district">District</label>
                        <select class="form-control" id="district" name="district" required>
                            <option value="" selected>Select District</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ward">Ward</label>
                        <select class="form-control" id="ward" name="ward" required>
                            <option value="" selected>Select Ward</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detailAddress">Detail Address</label>
                        <input type="text" class="form-control" id="detailAddress" name="detailAddress" placeholder="Detail Address" />
                    </div>

                    <button class="btn btn-primary mr-2" type="submit">Create Hotel</button>
                    <button class="btn btn-light" type="button" onclick="clearForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

