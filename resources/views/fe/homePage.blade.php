<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/user/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7b9d8c4ddc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="shortcut icon" href="{{asset('assets/images/logo_mini.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travel Easy</title>
</head>
<body>
    <div class="main">
        <div>
            @if ($message = Session::get('success'))
                <div class="success-message">
                    <button type="button" id="closeButton" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>

        <div class="header">
            <div class="header-top">
                <a href="{{route('index')}}"><img class="logo" src="{{asset('assets/images/logo_web_home.png')}}" alt=""></a>
                <div class="search-bar-looking-for">
                    <input type="search" name="" id="" placeholder="What are you looking for?">
                    <img src="{{asset('assets/images/loupe 1.png')}}" alt="">
                </div>
                <div class="home-listings-blog">
                    <a href="{{route('index')}}" id="home">Home</a>
                    <a href="{{route('tours.index')}}" id="listings">Listings</a>
                    <a href="{{route('blog.index')}}" id="blog">Blog</a>
                    
                    @if(Auth::check())
                        <!-- Hiển thị nếu người dùng đã đăng nhập -->
                        <a href="{{route('account')}}" id="account">{{ Auth::user()->name }}</a>
                        <a href="{{route('logout')}}" id="a_logout">Log out</a>
                    @else
                        <!-- Hiển thị nếu người dùng chưa đăng nhập -->
                        <a href="{{route('login')}}" id="login">Log in</a>
                        <a href="{{route('register')}}" id="register">Register</a>
                    @endif           
                </div>
            </div>
            <div class="header-mid">
                <h1>Explore Amazing Destinations</h1>
                <p>Find great places to stay, eat, shop, or visit from local experts.</p>
                <div class="search-bar-check">
                    <div class="input-search where">
                        <p>Where</p>
                        <select name="where" id="where" class="form-control">
                            <!-- <option value="">Where are you going</option> -->
                            <option value="Ha Noi">Ha Noi</option>
                            <option value="Da Nang">Da Nang</option>
                            <option value="Tp Ho Chi Minh">Tp Ho Chi Minh</option>
                        </select>
                    </div>
                    <div class="input-search check-in">
                        <p>Check in</p>
                        <input type="text" name="checkIn" id="checkIn" placeholder="Add dates">
                    </div>
                    <div class="input-search check-out">
                        <p>Check out</p>
                        <input type="text" name="checkOut" id="checkOut" placeholder="Add dates">
                    </div>
                    <div class="input-search guest">
                        <p>Guest</p>
                        <input type="text" name="guest" id="guest" placeholder="Add guest">
                    </div>
                    <div class="bt-search">
                        <i class="fas fa-search fa-1x"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="exclusive">    
                <h3>Exclusive deals</h3>
                <p>Discover some of the most popular listings in Vietnam based on user reviews and ratings</p>
            </div>
            <div class="listings-ratings">
                <div class="prev-button"><i class="fa-solid fa-angle-left"></i></div>
                    @php
                        $tourChunks = $tours->chunk(3);
                    @endphp

                    @foreach($tourChunks as $index => $tourChunk)
                        <div class="box-group {{ $index === 0 ? 'active' : 'hidden' }}">
                            @foreach($tourChunk as $tour)
                            <div class="box-of-lr">
                                <div class="lr-box">
                                    <div class="upper-img">
                                        <a href="{{ route('tours.show', $tour->idTour) }}"><img src="{{ asset($tour->imageTour) }}" alt=""></a>
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
                                        <img src="{{ asset('assets/images/pin.png') }}" alt="">
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
                    @endforeach
                <div class="next-button"><i class="fa-solid fa-angle-right"></i></div>
            </div>

            <div class="dot-page">
                @for ($i = 0; $i < $tourChunks->count(); $i++)
                <p class="dot-ls {{ $i === 0 ? 'active' : '' }}"></p>
                @endfor
            </div>

            <div class="trending-cities">
                <h3>Trending Citites</h3>
                <p>Cities you must explore this summer</p>
            </div>
            <div class="tc-images">
                <div class="upper-tc">
                    <div class="hg-hcm">
                        <div class="tc-img">
                            <img src="{{asset('assets/images/tc_img1.png')}}" alt="">
                        </div>
                        <div class="desc-tc">
                            <h4>Ha Giang</h4>
                            <p>62 Listings</p>
                        </div>
                    </div>
                    <div class="dn-hlb">
                        <div class="tc-img">
                            <img src="{{asset('assets/images/tc_img2.png')}}" alt="">
                        </div>
                        <div class="desc-tc">
                            <h4>Da Nang</h4>
                            <p>45 Listings</p>
                        </div>
                    </div>
                </div>
                <div class="bottom-tc">
                    <div class="dn-hlb">
                        <div class="tc-img">
                            <img src="{{asset('assets/images/tc_img3.png')}}" alt="tc3">
                        </div>
                        <div class="desc-tc">
                            <h4>Ha Long Bay</h4>
                            <p>86 Listings</p>
                        </div>
                    </div>
                    <div class="hg-hcm" id="hcm-ls">
                        <div class="tc-img">
                            <img src="{{asset('assets/images/tc_img4.png')}}" alt="tc4">
                        </div>
                        <div class="desc-tc">
                            <h4>Ho Chi Minh City</h4>
                            <p>21 Listings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-content">
            <div class="how-it-works">
                <h3>How it Works</h3>
                <p>Bring business and community member together.</p>
            </div>
            <div class="explain">
                <div class="explain-box">
                    <div class="hw-img">
                        <img src="{{asset('assets/images/find-location.png')}}" alt="">
                    </div>
                    <div class="desc-img-hw">
                        <h4>Find accomodation</h4>
                        <p>Explore and engage with exceptional nearby accomodations, immersing yourself in the authentic local liftstyle.</p>
                    </div>
                </div>
                <div class="explain-box">
                    <div class="hw-img">
                        <img src="{{asset('assets/images/comment.png')}}" alt="">
                    </div>
                    <div class="desc-img-hw">
                        <h4>Review Listings</h4>
                        <p>Examine the listings of accomodations and choose your favorite one that provides excellent value for its price.</p>
                    </div>
                </div>
                <div class="explain-box">
                    <div class="hw-img">
                        <img src="{{asset('assets/images/date.png')}}" alt="">
                    </div>
                    <div class="desc-img-hw">
                        <h4>Make a reservation</h4>
                        <p>Easily book your reservation within a minute and enjoy the flexibility to cancel anytime without incurring any fees.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="third-content">
            <div class="testimonials">
                <h3>Testimonials From Our Customers</h3>
                <p>A treasury of amazing travel experiences</p>
            </div>
            <div class="customers-reviews">
                <div class="review-box rw-box1">
                    <img src="{{asset('assets/images/review_img1.png')}}" alt="">
                    <h5>Quang</h5>
                    <p>Ha Noi</p>
                    <p>Quick and easy hotel booking with no cancellations fees. Highly recommended!</p>
                </div>
                <div class="review-box rw-box2">
                    <span>“</span>
                    <div id="review-position">
                        <img src="{{asset('assets/images/review_img2.png')}}" alt="">
                        <h5>Viet</h5>
                        <p>Hai Phong</p>
                        <p>The best booking site i've ever used. Instant confirmation, competitve prices and hassle-free cancellations.</p>
                    </div>
                </div>
                <div class="review-box rw-box3">
                    <img src="{{asset('assets/images/review_img3.png')}}" alt="">
                    <h5>Tam</h5>
                    <p>Ho Chi Minh</p>
                    <p>Time and money-saving hotel bookings. User-friendly and flexible. Highly recommended.</p>
                </div>
            </div>
        </div>
        <div class="dot-page">
            <p class="dot"></p>
            <p class="dot-black"></p>
            <p class="dot"></p>
            <p class="dot"></p>
            <p class="dot"></p>
        </div>
        <div class="forth-content">
            <div class="articles">
                <h3>Articles</h3>
                <p>Check out latest news and articles from our blog</p>
            </div>
            <div class="articles-container">
                @foreach ($bookings->take(3) as $booking)
                    <div class="article">
                        <div class="ar_img">
                            <a href="{{route('blog.index')}}"><img src="{{ asset($booking->tour->imageTour) }}" alt="ar"></a>
                            <span>{{ $booking->tour->address->city }}</span>
                        </div>
                        <i class="fa-regular fa-user"></i>
                        <span class="ar-name">{{ $booking->user->name }}</span>
                        <i class="fa-regular fa-calendar"></i>
                        <span>{{ \Carbon\Carbon::parse($booking->tour->endDay)->format('d F, Y') }}</span>
                        <h4>{{ $booking->tour->name }} very beautiful!</h4>
                    </div>
                @endforeach
            </div>
            <a href="{{route('blog.index')}}"><button id="navi-to-blog">View all articles</button></a>
        </div>
    @include('fe.layouts.footer')
    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>
</html>