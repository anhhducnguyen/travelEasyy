<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/user/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/user/footer.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7b9d8c4ddc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="shortcut icon" href="{{asset('assets/images/logo_mini.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
</head>
<body>
    <div class="header">
        <div class="header-top">
            <a href="{{route('index')}}"><img class="logo" src="{{asset('assets/images/logo_web_home.png')}}" alt=""></a>
            <div class="search-bar-looking-for">
                <input type="search" name="" id="" placeholder="What are you looking for?">
                <img src="{{ asset('assets/images/loupe 1.png')}}" alt="">
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
            <h2>Blog</h2>
            <p><span id="go-to-home">Home</span> / <span>Blog</span></p>
        </div>
    </div>
    <div class="content">
    <div class="page-content default" data-category="all">
            <div class="articles-container">
                @foreach ($bookings->chunk(6) as $chunk)
                    <div class="article-group">
                        @foreach ($chunk as $booking)
                            <div class="article">
                                <div class="ar_img">
                                    <img src="{{ asset($booking->tour->imageTour) }}" alt="ar">
                                    <span>{{ $booking->tour->address->city }}</span>
                                </div>
                                <i class="fa-regular fa-user"></i>
                                <span class="ar-name">{{$booking->user->name}}</span>
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ \Carbon\Carbon::parse($booking->tour->endDay)->format('d F, Y') }}</span>
                                <h4>{{ $booking->tour->name }} very beautiful!</h4>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            
            <div class="pagination">
                <img src="{{ asset('assets/images/Vector-1.png') }}" alt="" id="vector1">
                @for ($i = 0; $i < $bookings->chunk(6)->count(); $i++)
                    <p class="pagi">{{ $i + 1 }}</p>
                @endfor
                <img src="{{ asset('assets/images/Vector-2.png') }}" alt="" id="vector2">
            </div>
        </div>
        
        <div class="search-articles">
            <div class="search-location">
                <input type="search" id="city-search" placeholder="Enter location">
            </div>
            <div class="popular-cities-filter">
                <h3>Popular Cities</h3>
                <div class="cities-list">
                    <input type="radio" name="radio1" id="all" value="all" checked>
                    <label for="all" class="color-label">All</label>
                </div>
                @php
                    $listCities = []; 
                @endphp

                @foreach ($bookings as $booking)
                    @if ($booking->tour->address && $booking->tour->address->city)
                        @php
                            $city = $booking->tour->address->city;
                            $citySlug = Str::slug($city);
                        @endphp

                        @if (!in_array($citySlug, $listCities))
                            @php
                                $listCities[] = $citySlug;
                            @endphp

                            <div class="cities-list">
                                <input type="radio" name="radio1" id="{{ $citySlug }}" value="{{ $citySlug }}">
                                <label for="{{ $citySlug }}" class="color-label">{{ $city }}</label>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>



            <div class="top-articles">
                <h3>Top Article</h3>
                <div class="top-ar-img">
                    <a href="#"><img src="{{ asset('assets/images/top-1.png')}}" alt=""></a>
                    <div class="desc-top-ar">
                        <h5>Vietnam in Spring, what to do?</h5>
                        <p>January 7, 2021</p>
                    </div>
                </div>
                <div class="top-ar-img">
                    <a href="#"><img src="{{ asset('assets/images/top-2.png')}}" alt=""></a>
                    <div class="desc-top-ar">
                        <h5>Never forget the Cai Rang Floating Market</h5>
                        <p>January 27, 2022</p>
                    </div>
                </div>
                <div class="top-ar-img">
                    <a href="#"><img src="{{ asset('assets/images/top-3.png')}}" alt=""></a>
                    <div class="desc-top-ar">
                        <h5>8 reasons you should go to Nha Trang</h5>
                        <p>January 12, 2020</p>
                    </div>
                </div>
            </div>
            <div class="tags">
                <h3>Tags</h3>
                <div class="top-tags">
                    <span class="marker-tags">Traveling</span>
                    <span>Art</span>
                    <span>Vacation</span>
                </div>
                <div class="bottom-tags">
                    <span>Tourism</span>
                    <span>Culture</span>
                    <span>Lifestyle</span>
                </div>
            </div>
        </div>
    </div>

    @include('fe.layouts.footer')
    <script src="{{ asset('assets/js/blog.js') }}"></script>
</body>
</html>