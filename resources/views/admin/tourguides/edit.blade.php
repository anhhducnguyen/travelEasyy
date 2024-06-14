@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Tour Guide</h4>
                <form action="{{ route('admin.tourguides.update', $tourGuide->idTourGuide) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $tourGuide->name }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $tourGuide->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $tourGuide->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="{{ $tourGuide->address->city }}" selected>{{ $tourGuide->address->city }}</option>
                                    <!-- You may populate options dynamically here based on your data -->
                                </select>
                            </div>
                            <div style="height: 5px;"></div>

                            <div class="form-group">
                                <label for="district">District</label>
                                <select class="form-control" id="district" name="district">
                                    <option value="{{ $tourGuide->address->district }}" selected>{{ $tourGuide->address->district }}</option>
                                    <!-- You may populate options dynamically here based on your data -->
                                </select>
                            </div>
                            <div style="height: 4px;"></div>

                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <select class="form-control" id="ward" name="ward">
                                    <option value="{{ $tourGuide->address->ward }}" selected>{{ $tourGuide->address->ward }}</option>
                                    <!-- You may populate options dynamically here based on your data -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="detailAddress">Detail Address</label>
                                <input type="text" class="form-control" id="detailAddress" name="detailAddress" value="{{ $tourGuide->address->detailAddress }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Tour Guide</button>
                </form>
            </div>
        </div>
    </div>
@endsection
