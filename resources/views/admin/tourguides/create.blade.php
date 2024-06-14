<!-- admin.tourguides.create.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Tour Guide</h4>
                <form id="form" action="{{ route('admin.tourguides.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="city">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div style="height: 5px;"></div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <select class="form-control" id="district" name="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                            <div style="height: 5px;"></div>
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <select class="form-control" id="ward" name="ward">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="detailAddress">Detail Address</label>
                                <input type="text" class="form-control" id="detailAddress" name="detailAddress" placeholder="Detail Address" />
                            </div>
                        </div>
                    </div>    
                    <button class="btn btn-primary mr-2" type="submit">Create Tour Guide</button>
                    <button class="btn btn-light" type="button" onclick="clearForm()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
