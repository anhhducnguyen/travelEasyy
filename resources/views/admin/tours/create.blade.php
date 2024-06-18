


<!-- admin.tours.create.blade.php -->
@extends('admin.layouts.app')

@section('content')
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New Tour</h4>
                    <form action="{{ route('admin.tours.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
                                </div>
                                <div class="form-group">
                                    <label for="startDay">Start Day</label>
                                    <input type="date" class="form-control" id="startDay" name="startDay" required/>
                                </div>

                                <div class="form-group">
                                    <label for="endDay">End Day</label>
                                    <input type="date" class="form-control" id="endDay" name="endDay" required />
                                </div>

                                <div class="form-group">
                                    <label for="cost">Cost</label>
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost" required/>
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
                                    <select class="form-control"  id="city" name="city" required>
                                        <option value="" selected>Chọn tỉnh thành</option>
                                    </select>
                                </div>
                                <div style="height: 6px;"></div>


                                <div class="form-group">
                                    <label for="district">District</label>
                                    <select class="form-control" id="district" name="district" required>
                                        <option value="" selected>Chọn quận huyện</option>
                                    </select>
                                </div>
                                <div style="height: 8px;"></div>


                                <div class="form-group">
                                    <label for="ward">Ward</label>
                                    <select class="form-control" id="ward" name="ward" required>
                                        <option value="" selected>Chọn phường xã</option>
                                    </select>
                                </div>
                                <div style="height: 2px;"></div>

                                <div class="form-group">
                                    <label for="detailAddress">Detail Address</label>
                                    <input type="text" class="form-control" id="detailAddress" name="detailAddress" required>
                                </div>
                                
                                
                                <div style="margin-top: -5px;" class="form-group">
                                    <label for="exampleTextarea1">Description</label>
                                    <textarea
                                    class="form-control"
                                    id="exampleTextarea1"
                                    rows="10"
                                    name="description"
                                    required
                                    ></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-top:-1px;" class="form-group">
                                    <label>Image Tour</label>
                                    <input type="file" id="imageTourInput" name="imageTourInput" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" id="imagePath" name="imagePath" class="form-control file-upload-info" placeholder="Upload Image" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" onclick="updateImagePath()" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <img id="imgPrev" src="#" alt="Preview Image" style="max-width: 100%; margin-top: 10px; display: none;">
                                </div>
                            </div>
                        </div>
    
                        <button class="btn btn-primary mr-2" type="submit">Create Tour</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
