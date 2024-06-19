@extends('fe.layouts.app')

@section('title', 'Tour Details')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user/tourDetail.css') }}">
@endsection
@section('content')
    <div class="content">
    <div class="content-header-listings">
        <div class="left-ct-header">
            <div class="image-container"  >
                <img  src="{{ asset($tour->imageTour) }}" alt="Tour Image">
            </div>
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
                    <img src="{{ asset('assets/images/background1.png')}}" alt="Image 1">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/vinhhalong2.jpg')}}" alt="Image 2">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/vinhhalong3.jpg')}}" alt="Image 3">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/vinhhalong4.jpg')}}" alt="Image 4">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/vinhhalong5.jpg')}}" alt="Image 5">
                </div>
                <div class="img-small-desc">
                    <img src="{{ asset('assets/images/vinhhalong6.jpg')}}" alt="Image 6">
                    <span class="image-number">+4</span>
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
                        <p>Check-in time: 5:00AM <br>
                        Check-out time: 10:00AM <br>
                        Please note that this time may change. If there are any changes, we will notify you via email or phone number. You can also cancel your tour booking if the timing is not suitable. Thank you sincerely!</p>  
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>What is the cancellation policy?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>Our cancellation policy allows for full refund if canceled at least 48 hours in advance. For cancellations made less than 48 hours before the tour, a cancellation fee may apply. Please review the cancellation policy specific to your booking.</p>  
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>What is included in the tour package?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>The tour package includes accommodation, meals as specified, guided tours, and transportation during the tour.</p>
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>What activities are available during the tour?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>Activities vary depending on the tour package and destination. Typical activities include sightseeing tours, cultural experiences, outdoor adventures, and more. Please check the tour itinerary for specific activities.</p>  
                    </div>
                </div>
                <div class="faq-box">
                    <div class="header-faq">
                        <h6>Are there any additional fees or taxes not included in the tour price?</h6>
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="content-faq">
                        <p>The tour price includes all specified fees and taxes unless otherwise stated. There are no hidden fees, and all costs will be clearly outlined in the booking confirmation.</p>  
                    </div>
                </div>
            </div>
            <h5>Video</h5>
            <iframe width="100%" height="450" src="https://www.youtube.com/embed/xdjTOWBowrA" title="VỊNH HẠ LONG: KỲ QUAN THIÊN NHIÊN CỦA THẾ GIỚI" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="right-price-content">
            <div class="price-box-book">
                <span id="price-amount">{{ $tour->cost }} $</span>
                <span id="room-night"> / person</span>
                <table>
                    <tr>
                        <th id="th-border">
                            <p class="cin-cout">CHECK - IN</p>
                            <p class="date-ch">{{\Carbon\Carbon::parse($tour->startDay)->format('d F, Y')}}</p>
                        </th>
                        <th>
                            <p class="cin-cout">CHECK - OUT</p>
                            <p class="date-ch">{{ \Carbon\Carbon::parse($tour->endDay)->format('d F, Y') }}</p>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2" id="td-border">
                            <span>GUEST</span>
                            <input type="number" id="guestCount" name="guestCount" min="1" value="1" oninput="calculateTotal()">
                        </td>
                    </tr>
                </table>
                <h6>Price detail</h6>
                <div class="price-detail-booking">
                    <div class="fee-row">
                        <p>Cost</p>
                        <p class="fee-b" id="basePrice">{{ $tour->cost }}</p>
                    </div>
                    <div class="fee-row">
                        <p>Service fee</p>
                        <p class="fee-b" id="serviceFee">3</p>
                    </div>
                </div>
                <div class="total-price">
                    <h6>Total</h6>
                    <p id="totalPrice">{{ $tour->cost + 3 }}</p>
                </div>
                <form id="bookingForm" action="{{ route('checkout.storeSession') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tourId" value="{{ $tour->idTour }}">
                    <input type="hidden" name="serviceFee" value="3">
                    <input type="hidden" name="totalPrice" id="formTotalPrice" value="{{ $tour->cost + 3 }}">
                    <input type="hidden" name="guestCount" id="formGuestCount" value="1">
                    <button type="submit" id="btn-book">Book now</button>
                </form>
            </div>


            <div class="location-booking-hotel">
                <h5>Location</h5>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238636.9745579036!2d106.98481404522053!3d20.843707365324605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a5796518cee87%3A0x55c6b0bcc85478db!2zVuG7i25oIEjhuqEgTG9uZw!5e0!3m2!1svi!2s!4v1718526072328!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="desc-lc-booking">
                    <div class="lct-box address">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>    
                            <p>{{ $tour->address->detailAddress }}, {{ $tour->address->district }}, {{ $tour->address->city }}</p>
                            <p id="direct-map">Get Directions</p>
                        </div>
                    </div>
                    <div class="lct-box phone-number">
                        <i class="fa-solid fa-phone"></i>
                        <p>037 630 1234</p>
                    </div>
                    <div class="lct-box email">
                        <i class="fa-regular fa-envelope"></i>
                        <p>admin@gmail.com</p>
                    </div>
                    <div class="lct-box link">
                        <i class="fa-solid fa-link"></i>
                        <p>traveleasy.com</p>
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
                @foreach($tours as $tour)
                    <div class="list-box" id="navi-to-ls-detail">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="{{ asset($tour->imageTour) }}" alt="">
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
        <button id="view-all-ls" onclick="toggleListings()">View all listings</button>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/tourDetail.js') }}"></script>
@endsection
