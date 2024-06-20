@extends('fe.layouts.app')

@section('title', 'Listings')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user/listings.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="listings-header">
        <h2>Listings</h2>
        <p>Home / Listings</p>
    </div>
    <div class="content-listings">
        <div class="search-filter-listings">
            <div class="what-are-you-looking-for-filter">
                <input type="search" name="tour_search" id="tour_search" placeholder="What are you looking for?" autocomplete="off">
            </div>
            <div class="categories-filter">
                <p>All Categories</p>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="location-filter">
                <p>Location</p>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div class="radius-around-filter">
                <p>Radius around selected destination</p>
                <input type="range" id="radius-slider" min="0" max="160" value="50">
                <p id="kilometer-range">50 km</p>
            </div>
            <div class="price-range-filter">
                <p>Price range</p>
                <select id="price_range_select">
                    <option value="all">All</option>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div class="tags-filter">
                <h4>Tags</h4>
                <div class="tags-box">
                    <input type="checkbox" name="" id="credit-card">
                    <label for="credit-card">Accepts Credit Cards</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="smoking-allowed">
                    <label for="smoking-allowed">Smoking Allowed</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="bike-parking">
                    <label for="bike-parking">Bike Parking</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="street-parking">
                    <label for="street-parking">Street Parking</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="wireless-internet">
                    <label for="wireless-internet">Wireless Internet</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="alcohol">
                    <label for="alcohol">Alcohol</label>
                </div>
                <div class="tags-box">
                    <input type="checkbox" name="" id="pet-friendly">
                    <label for="pet-friendly">Pet Friendly</label>
                </div>
            </div>
            <button id="search-filter">Search</button>
            <p id="reset-filter">Reset Filter</p>
        </div>
        <div class="listings-container">
            <div class="listings-container-header">
                <div class="showing-results">
                    <span class="color-span">Showing</span>
                    <span>1 - 6 results</span>
                </div>
                <div class="sort-listings">
                    <label for="sort_by">Sort By:</label>
                    <select id="sort_by">
                        <option value="default">Default</option>
                        <option value="price_low_to_high">Price: Low to High</option>
                        <option value="price_high_to_low">Price: High to Low</option>
                    </select>
                    <div class="arrange-filter-menu">
                        <img src="{{asset('assets/images/grid-arrange.png')}}" alt="grid">
                        <img src="{{asset('assets/images/list-menu.png')}}" alt="menu">
                    </div>
                </div>
            </div>
            <div class="listings-list-booking">
            @foreach($tours as $tour)
                <div class="list-box" id="navi-to-ls-detail">
                    <div class="lr-box">
                        <div class="upper-img">
                            <a href="{{ route('tours.show', $tour->idTour) }}"><img src="{{ $tour->imageTour }}" alt=""></a>    
                        </div>
                        <div class="price">
                            <a href="">{{ number_format($tour->cost, 0, ',', '.') }} $</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        @php
                            $randomImageIndex = rand(1, 3);
                        @endphp
                        <img src="{{ asset('/assets/images/star_9.png') }}" alt="" class="star-ratings">
                        <img src="{{ asset('/assets/images/profile' . $randomImageIndex . '.png') }}" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="{{ asset('/assets/images/pin.png')}}" alt="">
                            <span>{{ $tour->address->district }}, {{ $tour->address->city }}</span>
                        </div>
                        <h4>{{ $tour->name }}</h4>
                        <p class="description">{{ $tour->description }}</p>
                    </div>
                    <a href="{{ route('tours.show', $tour->idTour) }}">
                        <button>Book now</button>
                    </a>
                </div>
                
            @endforeach
            </div>
  
            <div class="pagination">
                <img src="{{asset("assets/images/Vector-1.png")}}" alt="" id="vector1">
                <p class="pagi">1</p>
                <p class="pagi">2</p>
                <p class="pagi">3</p>
                <p class="pagi">4</p>
                <p class="pagi">5</p>
                <img src="{{asset("assets/images/Vector-2.png")}}" alt="" id="vector2">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/listings.js') }}"></script>
@endsection
