
@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Tour</h4>
                <form id="form" action="{{ route('admin.tours.update', $tour->idTour) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
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
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-group" for="idTourGuide">Tour Guide</label>
                                <select class="form-control" id="idTourGuide" name="idTourGuide">
                                    <option value="" selected>Select Tour Guide</option>
                                    @foreach($tourGuides as $tourGuide)
                                        <option value="{{ $tourGuide->idTourGuide }}" {{ $tour->idTourGuide == $tourGuide->idTourGuide ? 'selected' : '' }}>{{ $tourGuide->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="height: 5px;"></div>

                            <div class="form-group">
                                <label class="form-group" for="city">City</label>
                                <select class="form-control" class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                                    <option value="{{ $tour->address->city }}" selected>{{ $tour->address->city }}</option>           
                                </select>
                            </div>
                            <div style="height: 6px;"></div>

                            <div class="form-group">
                                <label class="form-group" for="district">District</label>
                                <select class="form-control" class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                                    <option value="{{ $tour->address->district }}" selected>{{ $tour->address->district }}</option>
                                </select>
                            </div>
                            <div style="height: 8px;"></div>

                            <div class="form-group">
                                <label class="form-group" for="ward">Ward</label>
                                <select class="form-control" class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                                    <option value="{{ $tour->address->ward }}" selected>{{ $tour->address->ward }}</option>
                                </select>
                            </div>
                            <div style="height: 2px;"></div>

                            <div class="form-group">
                                <label class="form-group" for="detailAddress">Detail Address</label>
                                <input class="form-control" type="text" id="detailAddress" name="detailAddress" value="{{ $tour->address->detailAddress }}">
                            </div>
                            <div style="margin-top: -5px;" class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea
                                    class="form-control"
                                    id="exampleTextarea1"
                                    rows="10"
                                    name="description"
                                >{{ $tour->description }}</textarea>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div style="margin-top:-4px;" class="form-group">
                                <label>Image Tour</label>
                                <input type="file" id="imageTourInput" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" id="imagePath" name="imagePath" class="form-control file-upload-info" value="{{ $tour->imageTour }}" placeholder="Upload Image" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button" onclick="updateImagePath()">Upload</button>
                                    </span>
                                <img id="imgPrev" src="{{ asset( $tour->imageTour) }}" alt="Preview Image" style="max-width: 100%; margin-top: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mr-2" type="submit">Update Tour</button>
                </form>
            </div>
        </div>
    </div>

@endsection

