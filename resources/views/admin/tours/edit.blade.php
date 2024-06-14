
@extends('admin.layouts.app')

@section('content')
<h1>Edit Tour</h1>
        <form id="form" action="{{ route('admin.tours.update', $tour->idTour) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-group" for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ $tour->name }}">
            </div>

            <div class="form-group">
                <label class="form-group" for="startDay">Start Day</label>
                <input class="form-control" type="date" id="startDay" name="startDay" value="{{ $tour->startDay }}">
            </div>

            <div class="form-group">
                <label class="form-group" for="endDay">End Day</label>
                <input class="form-control" type="date" id="endDay" name="endDay" value="{{ $tour->endDay }}">
            </div>

            <div class="form-group">
                <label class="form-group" for="cost">Cost</label>
                <input class="form-control" type="text" id="cost" name="cost" value="{{ $tour->cost }}">
            </div>

            <div class="form-group">
                <label class="form-group" for="city">City</label>
                <select class="form-control" class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->city }}" selected>{{ $tour->address->city }}</option>           
                </select>
            </div>
            <div class="form-group">
                <label class="form-group" for="district">District</label>
                <select class="form-control" class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->district }}" selected>{{ $tour->address->district }}</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-group" for="ward">Ward</label>
                <select class="form-control" class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->ward }}" selected>{{ $tour->address->ward }}</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-group" for="detailAddress">Detail Address</label>
                <input class="form-control" type="text" id="detailAddress" name="detailAddress" value="{{ $tour->address->detailAddress }}">
            </div>

            <div class="form-group">
                <label class="form-group" for="idHotel">Hotel</label>
                <select class="form-control" id="idHotel" name="idHotel">
                    <option value="" selected>Select Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->idHotel }}" {{ $tour->idHotel == $hotel->idHotel ? 'selected' : '' }}>{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-group" for="idVehicle">Vehicle</label>
                <select class="form-control" id="idVehicle" name="idVehicle">
                    <option value="" selected>Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->idVehicle }}" {{ $tour->idVehicle == $vehicle->idVehicle ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-group" for="idTourGuide">Tour Guide</label>
                <select class="form-control" id="idTourGuide" name="idTourGuide">
                    <option value="" selected>Select Tour Guide</option>
                    @foreach($tourGuides as $tourGuide)
                        <option value="{{ $tourGuide->idTourGuide }}" {{ $tour->idTourGuide == $tourGuide->idTourGuide ? 'selected' : '' }}>{{ $tourGuide->name }}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary mr-2" type="submit">Update Tour</button>
        </form>

@endsection
