@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Hotel</h4>
                <form action="{{ route('admin.hotels.update', $hotel->idHotel) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" id="city" name="city" required>
                            <option value="{{ $hotel->address->city }}" selected>{{ $hotel->address->city }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="district">District</label>
                        <select class="form-control" id="district" name="district" required>
                            <option value="{{ $hotel->address->district }}" selected>{{ $hotel->address->district }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ward">Ward</label>
                        <select class="form-control" id="ward" name="ward" required>
                            <option value="{{ $hotel->address->ward }}" selected>{{ $hotel->address->ward }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detailAddress">Detail Address</label>
                        <input type="text" class="form-control" id="detailAddress" name="detailAddress" value="{{ $hotel->address->detailAddress }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Hotel</button>
                </form>
            </div>
        </div>
    </div>
@endsection