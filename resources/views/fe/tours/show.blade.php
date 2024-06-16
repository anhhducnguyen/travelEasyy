@extends('fe.layouts.app')

@section('title', 'Tour Details')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user/tourDetail.css') }}">
@endsection
@section('content')
    <div class="content">
    <div class="content-header-listings">
        <div class="left-ct-header">
            <img src="{{ asset('assets/images/profile-detail.png') }}" alt="Tour Image">
            <div class="desc-profile">
                <h4>{{ $tour->name }}</h4>
                <div class="phone-location">
                    <img src="{{ asset('assets/images/pin.png') }}" alt="" id="pin-icon">
                    <span>{{ $tour->address->district }}, {{ $tour->address->city }}</span>
                    <img src="{{ asset('assets/images/rating-listings-star.png')}}" alt="" id="star-ratings">
                </div>
            </div>
        </div>
    </div>
        <div class="content-main-image">
            <div class="left-main-img">
                <img src="{{ asset($tour->imageTour) }}" alt="ls-detail">
            </div>
            <div class="right-small-image">
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img1.png')}}" alt="Image 1">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img2.png')}}" alt="Image 2">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img3.png')}}" alt="Image 3">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img4.png')}}" alt="Image 4">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img5.png')}}" alt="Image 5">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/right-img6.png')}}" alt="Image 6">
                </div>
            </div>
        </div>
    </div>
    <div class="second-content">
        <div class="left-overview-content">
            <h5>Overview</h5>
            <div class="overview-hotel">
                <p class="paragraph" id="para-text">{{$tour->description}}</p>
                <p id="hide-and-show-text">Show more</p>
            </div>
            <h5>Amenities</h5>
            <div class="amenities-tags">
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>
                    <p>Accepts Credit Cards</p>
                </div>
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-solid fa-bicycle"></i>
                    </div>
                    <p>Bike Parking</p>
                </div>
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <p>Parking Street</p>
                </div>
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-solid fa-wifi"></i>
                    </div>
                    <p>Wireless Internet</p>
                </div>
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-solid fa-wheelchair"></i>
                    </div>
                    <p>Wheelchair Accessible</p>
                </div>
                <div class="amenities-box">
                    <div class="box-icon">
                        <i class="fa-solid fa-paw"></i>
                    </div>
                    <p>Pets Friendly</p>
                </div>
            </div>
            <h5>Frequently Asked Questions</h5>
            <div class="FAQ">
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>What is the Check-in and check-out time?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>Check-in time: 3:00PM <br>
                        Check-out time: 11:00AM <br>
                        Please note that these times can vary depending on the specific rental property and the policies set by the homeowner or property management. It's always recommended to confirm the exact check-in and check-out times with the property owner or rental agency when making a reservation.</p>  
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>How far is the Hotel from airport?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>Certainly, the hotel is situated at a distance of approximately 6 kilometers from the airport.</p>
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>Do you have cocktails at the bar?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>Certainly, our establishment does indeed offer a selection of cocktails at the bar for your enjoyment.</p>  
                    </div>
                </div>
            </div>
            <h5>Video</h5>
            <img src="{{ asset('assets/images/video-listing-detail.png')}}" alt="video-listing-detail" width="100%">
        </div>
        <div class="right-price-content">
            <div class="price-box-book">
                <span id="price-amount">{{$tour->cost}} $</span>
                <span id="room-night"> / person</span>
                <table>
                    <tr>
                      <th id="th-border">
                        <p class="cin-cout">CHECK - IN</p>
                        <p class="date-ch">{{$tour->startDay}}</p>
                      </th>
                      <th>
                        <p class="cin-cout">CHECK - OUT</p>
                        <p class="date-ch">{{$tour->endDay}}</p>
                      </th>
                    </tr>
                    <tr>
                      <td colspan="2" id="td-border">
                        <p>GUEST</p>
                        <input type="text">
                      </td>
                    </tr>
                </table>
                <h6>Price detail</h6>
                <div class="price-detail-booking">
                    <div class="fee-row">
                        <p>$18 x 5 nights</p>
                        <p class="fee-b">$90</p>
                    </div>
                    <div class="fee-row">
                        <p>Service fee</p>
                        <p class="fee-b">$30</p>
                    </div>
                </div>
                <div class="total-price">
                    <h6>Total</h6>
                    <p>$120</p>
                </div>
                <button id="btn-book">Book now</button>
            </div>
            <div class="location-booking-hotel">
                <h5>Location</h5>
                <img src="./images/map-hotel.png" alt="map-hotel" width="100%", height="auto">
                <div class="desc-lc-booking">
                    <div class="lct-box address">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>    
                            <p>01 Độc Lập, Quán Thánh, Ba Đình, Hà Nội</p>
                            <p id="direct-map">Get Directions</p>
                        </div>
                    </div>
                    <div class="lct-box phone-number">
                        <i class="fa-solid fa-phone"></i>
                        <p>080 41532</p>
                    </div>
                    <div class="lct-box email">
                        <i class="fa-regular fa-envelope"></i>
                        <p>lmao@gmail.com</p>
                    </div>
                    <div class="lct-box link">
                        <i class="fa-solid fa-link"></i>
                        <p>www.guido.com</p>
                    </div>
                </div>
            </div>
        </div>   
    </div>
    <div class="third-content">
        <div class="exclusive">    
            <h3>Exclusive deals</h3>
            <p>Discover some of the most popular listings in Vietnam based on user reviews and ratings</p>
        </div>
        <div class="list-container">
            <div class="list-box" id="navi-to-ls-detail">
                <div class="lr-box">
                    <div class="upper-img">
                        <img src="./images/hcm1.png" alt="">
                    </div>
                    <div class="price">
                        <a href="">$120/ night</a>
                    </div>
                    <div class="icon-heart">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="./images/star_9.png" alt="" class="star-ratings">
                    <img src="./images/profile3.png" alt="" class="profile-lr">
                </div>
                <div class="desc-of-lr">
                    <div class="location">
                        <img src="./images/pin.png" alt="">
                        <span>District 1, Ho Chi Minh</span>
                    </div>
                    <h4>Spacious family home with modern amenities</h4>
                    <p>Located in a vibrant neighbourhood, near an array of trendy shops, restaurants, cafe etc.</p>
                </div>
                <button>Book now</button>
            </div>
            <div class="list-box">
                <div class="lr-box">
                    <div class="upper-img">
                        <img src="./images/hcm2.png" alt="">
                    </div>
                    <div class="price">
                        <a href="">$120/ night</a>
                    </div>
                    <div class="icon-heart">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="./images/star_9.png" alt="" class="star-ratings">
                    <img src="./images/profile3.png" alt="" class="profile-lr">
                </div>
                <div class="desc-of-lr">
                    <div class="location">
                        <img src="./images/pin.png" alt="">
                        <span>District 1, Ho Chi Minh</span>
                    </div>
                    <h4>Serene house with breathtaking lakeviews</h4>
                    <p>Enjoy the view straight from the dining room, and also only 15 mins downtown.</p>
                </div>
                <button>Book now</button>
            </div>
            <div class="list-box">
                <div class="lr-box">
                    <div class="upper-img">
                        <img src="./images/hcm3.png" alt="">
                    </div>
                    <div class="price">
                        <a href="">$120/ night</a>
                    </div>
                    <div class="icon-heart">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <img src="./images/star_9.png" alt="" class="star-ratings">
                    <img src="./images/profile3.png" alt="" class="profile-lr">
                </div>
                <div class="desc-of-lr">
                    <div class="location">
                        <img src="./images/pin.png" alt="">
                        <span>District 3, Ho Chi Minh</span>
                    </div>
                    <h4>Elegant house with panoramic views</h4>
                    <p>Offering breathtaking skyline view and close proximity to high-end shopping mall.</p>
                </div>
                <button>Book now</button>
            </div>
        </div>
        <button id="view-all-ls">View all listings</button>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/tourDetail.js') }}"></script>
@endsection
