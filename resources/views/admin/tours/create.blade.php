
<!-- admin.tours.create.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Tour</h4>
                <form id="form" action="{{ route('admin.tours.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label for="startDay">Start Day</label>
                                <input type="date" class="form-control" id="startDay" name="startDay" />
                            </div>

                            <div class="form-group">
                                <label for="endDay">End Day</label>
                                <input type="date" class="form-control" id="endDay" name="endDay" />
                            </div>
                            <div class="form-group">
                                <label for="cost">Cost</label>
                                <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" />
                            </div>
                            <div class="form-group">
                                <label for="idHotel">Hotel</label>
                                <select class="form-control" id="idHotel" name="idHotel">
                                    <option value="" selected>Select Hotel</option>
                                    @foreach($hotels as $hotel)
                                        <option value="{{ $hotel->idHotel }}">{{ $hotel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="idVehicle">Vehicle</label>
                                <select class="form-control" id="idVehicle" name="idVehicle">
                                    <option value="" selected>Select Vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->idVehicle }}">{{ $vehicle->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">                                             
                            <div class="form-group">
                                <label for="idTourGuide">Tour Guide</label>
                                <select class="form-control" id="idTourGuide" name="idTourGuide">
                                    <option value="" selected>Select Tour Guide</option>
                                    @foreach($tourGuides as $tourGuide)
                                        <option value="{{ $tourGuide->idTourGuide }}">{{ $tourGuide->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="height: 5px;"></div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <select class="form-control"  id="city" name="city">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div style="height: 6px;"></div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <select class="form-control" id="district" name="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div style="height: 8px;"></div>
                            
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <select class="form-control" id="ward" name="ward">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                            <div style="height: 2px;"></div>
                            
                            <div class="form-group">
                                <label for="detailAddress">Detail Address</label>
                                <input type="text" class="form-control" id="detailAddress" name="detailAddress">
                            </div>
                            <div style="margin-top:-4px;" class="form-group">
                                <label>Image Tour</label>
                                <input type="file" name="img[]" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea
                                class="form-control"
                                id="exampleTextarea1"
                                rows="32"
                                ></textarea>
                            </div>
                        
                        </div>
                    </div>    
                    <button class="btn btn-primary mr-2" type="submit">Create Tour</button>
                    <button class="btn btn-light" type="button" onclick="clearForm()" >Cancel</button>
                </form>
            </div>
        </div>
    </div>

@endsection
