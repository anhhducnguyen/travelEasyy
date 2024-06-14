<!-- admin.dashboard.index.blade.php -->
@extends('admin.layouts.app')

@section('content')

            <div class="page-header flex-wrap">
              
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                  <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                          <div class="d-flex justify-content-between align-items-start">
                              <div class="color-card">
                                  <p class="mb-0 color-card-head">Sales</p>
                                  <h2 class="text-white">$8,753.<span class="h5">00</span></h2>
                              </div>
                              <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                          </div>
                          <h6 class="text-white">18.33% Since last month</h6>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                  <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                          <div class="d-flex justify-content-between align-items-start">
                              <div class="color-card">
                                  <p class="mb-0 color-card-head">Tour</p>
                                  <h2 class="text-white">{{$tourCount}}</h2>
                              </div>
                              <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                          </div>
                          <h6 class="text-white">13.21% Since last month</h6>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                  <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                          <div class="d-flex justify-content-between align-items-start">
                              <div class="color-card">
                                  <p class="mb-0 color-card-head">Orders</p>
                                  <h2 class="text-white">$1,753.<span class="h5">00</span></h2>
                              </div>
                              <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                          </div>
                          <h6 class="text-white">67.98% Since last month</h6>
                      </div>
                  </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                  <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                          <div class="d-flex justify-content-between align-items-start">
                              <div class="color-card">
                                  <p class="mb-0 color-card-head">Users</p>
                                  <h2 class="text-white">{{ $userCount }}</h2>
                              </div>
                              <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                          </div>
                          <h6 class="text-white">20.32% Since last month</h6>
                      </div>
                  </div>
              </div>
          </div>
@endsection
