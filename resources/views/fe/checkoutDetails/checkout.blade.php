@extends('fe.layouts.app')

@section('title', 'Checkout Details')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/user/checkout.css') }}">
@endsection

@section('content')
@if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif
<div class="main">
            <div class="section1">
                <div class="tour-package">
                    <a href="{{ route('tours.show', $tour->idTour) }}">
                        <span class="number">1</span>
                        <span class="text">Tour Package</span>
                    </a>                   
                </div>
                <i class="fa-solid fa-chevron-right"></i>
                <div class="checkout-details {{ session('success') ? 'active' : '' }}">
                    <a href='{{ route('checkout.show', $tour->idTour) }}'>
                        <span class="number">2</span>
                        <span class="text">Checkout details</span>
                    </a>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
                <div class="order-complete {{ session('success') ? 'active' : '' }}">
                    <a href="">
                        <span class="number">3</span>
                        <span class="text">Order Complete</span>
                    </a>
                </div>
            </div>
            <div class="section2 {{ session('success') ? 'hidden' : '' }}">
                <div class="voucher">
                    <span>Do you have a coupon code?</span> <span id="show-voucher">Click here to enter</span>
                    <div class="voucher-main">
                        <p>Please fill in below</p>
                        <div class="input">
                            <input type="text" name="" id="" placeholder="Coupon code"><button>Confirm</button>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <div class="left">
                        <div class="information">
                            <p style="font-size: 18px;">Payment information</p>
                            <p>Email *</p>
                            <input id="email" type="text" value="{{$user->email}}" redirect>

                            <p>Name *</p>
                            <input id="name" type="text" placeholder="Your Name" value="{{$user->name}}" redirect>

                            <p>Address *</p>
                            <input id="address" type="text" placeholder="Eg: No xx Nguyen Trai Street, Ha Dong, Ha Noi" value="{{ $address ? $address->detailAddress . ',' . $address->ward . ',' . $address->district . ',' . $address->city : '' }}" redirect>
                            
                            <p>Phone *</p>
                            <input id="phone" type="text" value="{{$user->phone}}" redirect>
                        </div>
                        <div class="note">
                            <p style="font-size: 18px;">Additional information</p>
                            <p>Order notes (optional)</p>
                            <textarea name="" id="" cols="85" rows="7" placeholder="Notes, e.g. some additional requirements,..."></textarea>
                        </div>

                    </div>
                    <div class="right">
                        <p style="font-size: 18px;">Your order</p>
                        <ul>
                            <li>
                                <p>Tour Package</p>
                                <p>Price</p>
                            </li>
                            <li>
                                <p style="color: #6d6d6d; font-weight: normal;">{{$tour->name}}</p>
                                <span style="font-weight: bold; color: #6d6d6d; margin-left: -160px;">x{{$guestCount}}</span>
                                <p><span>{{$tour->cost}} $ / 1 </span></p>
                            </li>
                            <li>
                                <p>Service fee</p>
                                <p><span>{{$serviceFee}} $</span></p>
                            </li>
                            <li>
                                <p>Total</p>
                                <p><span>{{$totalPrice}} $</span></p>
                            </li>
                        </ul>
                        <form id="confirmBookingForm" action="{{ route('bookings.confirm') }}" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <input type="hidden" name="tourId" value="{{ $tour->idTour }}">
                            <input type="hidden" name="serviceFee" value="{{ $serviceFee }}">
                            <input type="hidden" name="quantityTicket" value="{{ $guestCount }}">
                            <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                            <button type="submit">Confirm</button>
                        </form>

                        <p style="font-weight: normal;">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="">chính sách riêng tư</a>.</p>
                    </div>                    
                </div>
                
            </div> 
            @if(session('success'))
            <div class="order-complete-message">
                <p>Order Success! Please check your email.</p>
            </div>
            @endif   
        </div>  
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/checkout.js') }}"></script>
@endsection
