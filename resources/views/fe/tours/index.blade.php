<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings</title>
    <link rel="stylesheet" href="{{ asset('assets/css/listings.css') }}">
    <script src="https://kit.fontawesome.com/1214d8ad52.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="./images/logo_web.ico" type="image/x-icon">
</head>
<body>
    <div class="header">
        <a href="W01-home.html"><img src="{{asset('assets/images/logo.png')}}" alt=""></a>
        <div class="search-bar-looking-for">
            <input type="search" name="" id="" placeholder="What are you looking for?">
            <img src="{{asset('assets/images/loupe 1.png')}}" alt="">
        </div>
        <div class="home-listings-blog">
            <a href={{route('index')}} id="home">Home</a>
            <a href={{route('tours.index')}} id="listings">Listings</a>
            <a href="W02-blog.html" id="blog">Blog</a>
            <a href="" id="log-in">Log in</a>
            <a href="" id="register">Register</a>
        </div>
    </div>
    <div class="content">
        <div class="listings-header">
            <h2>Listings</h2>
            <p>Home / Listings</p>
        </div>
        <div class="content-listings">
            <div class="search-filter-listings">
                <div class="what-are-you-looking-for-filter">
                    <input type="search" name="" id="" placeholder="What are you looking for?">
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
                    <input type="range" name="" id="" min="0" max="160" value="50">
                    <p id="kilometer-range">50 km</p>
                </div>
                <div class="price-range-filter">
                    <p>Price range</p>
                    <i class="fa-solid fa-angle-down"></i>
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
                        <span>1 - 8 of 10 results</span>
                    </div>
                    <div class="sort-listings">
                        <div class="sort-by">
                            <span class="color-span">Sort By:</span>
                            <span>Default</span>
                            <i class="fa-solid fa-angle-down"></i>  
                        </div>
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
                                <img src="{{ $tour->imageTour }}" alt="">
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
                            <p>{{ $tour->description }}</p>
                        </div>
                        <button onclick="document.getElementById('book-tour-{{ $tour->id }}').style.display='block'">Book now</button>

                        <!-- <div id="book-tour-{{ $tour->id }}" style="display:none;">
                            <form action="{{ route('tours.book') }}" method="POST">
                                @csrf
                                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div>
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" required>
                                </div>
                                <div>
                                    <label for="number_of_people">Number of People</label>
                                    <input type="number" id="number_of_people" name="number_of_people" required>
                                </div>
                                <button type="submit">Book Tour</button>
                            </form>
                        </div> -->
                    </div>
                @endforeach
                </div>
                <!-- <div class="listings-list-booking">
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
                                <span>District 3, Ho Chi Minh</span>
                            </div>
                            <h4>Elegant house with panoramic views</h4>
                            <p>Offering breathtaking skyline view and close proximity to high-end shopping mall.</p>
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
                                <span>District 2, Ho Chi Minh</span>
                            </div>
                            <h4>Cosy and affordable: Quaint bungalow in a quiet neighborhood</h4>
                            <p>Easy access to shopping, dining and various entertainment options.</p>
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
                                <span>Thao Dien, Ho Chi Minh</span>
                            </div>
                            <h4>Fully furnished apartment near main campus</h4>
                            <p>Near the university and other entertainment, restaurants and supermarkets.</p>
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
                                <span>Binh Thanh, Ho Chi Minh</span>
                            </div>
                            <h4>Contemporary home with designer finishes</h4>
                            <p>Minimal decor but having several services near the house such as: dining, shopping etc.</p>
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
                                <span>Thu Duc, Ho Chi Minh</span>
                            </div>
                            <h4>Spacious townhouse in a vibrant neighborhood</h4>
                            <p>Have a park for jogging, walking and a superior gym with personal trainers.</p>
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
                                <span>District 9, Ho Chi Minh</span>
                            </div>
                            <h4>Peaceful house in a nature-filled setting</h4>
                            <p>Nestled in nature, while still being within a short commute to the city centre.</p>
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
                                <span>Phu My Hung, Ho Chi Minh</span>
                            </div>
                            <h4>Stylish apartment in the heart of the city</h4>
                            <p>Offering convenient access to shops, restaurants and entertaiment</p>
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
                                <span>Go Vap, Ho Chi Minh</span>
                            </div>
                            <h4>Unique house with stunning architectural features</h4>
                            <p>Near the city centre, offer the convenience of proximity to urban amenities.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                </div>
                <div class="listings-list-booking">
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
                                <span>District 2, Ho Chi Minh</span>
                            </div>
                            <h4>Cosy and affordable: Quaint bungalow in a quiet neighborhood</h4>
                            <p>Easy access to shopping, dining and various entertainment options.</p>
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
                                <span>Thao Dien, Ho Chi Minh</span>
                            </div>
                            <h4>Fully furnished apartment near main campus</h4>
                            <p>Near the university and other entertainment, restaurants and supermarkets.</p>
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
                                <span>Binh Thanh, Ho Chi Minh</span>
                            </div>
                            <h4>Contemporary home with designer finishes</h4>
                            <p>Minimal decor but having several services near the house such as: dining, shopping etc.</p>
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
                                <span>Thu Duc, Ho Chi Minh</span>
                            </div>
                            <h4>Spacious townhouse in a vibrant neighborhood</h4>
                            <p>Have a park for jogging, walking and a superior gym with personal trainers.</p>
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
                                <span>District 9, Ho Chi Minh</span>
                            </div>
                            <h4>Peaceful house in a nature-filled setting</h4>
                            <p>Nestled in nature, while still being within a short commute to the city centre.</p>
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
                                <span>Phu My Hung, Ho Chi Minh</span>
                            </div>
                            <h4>Stylish apartment in the heart of the city</h4>
                            <p>Offering convenient access to shops, restaurants and entertaiment</p>
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
                                <span>Go Vap, Ho Chi Minh</span>
                            </div>
                            <h4>Unique house with stunning architectural features</h4>
                            <p>Near the city centre, offer the convenience of proximity to urban amenities.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                </div>
                <div class="listings-list-booking">
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <img src="./images/hcm4.png" alt="">
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
                                <img src="./images/hcm4.png" alt="">
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
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>District 2, Ho Chi Minh</span>
                            </div>
                            <h4>Cosy and affordable: Quaint bungalow in a quiet neighborhood</h4>
                            <p>Easy access to shopping, dining and various entertainment options.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>Thao Dien, Ho Chi Minh</span>
                            </div>
                            <h4>Fully furnished apartment near main campus</h4>
                            <p>Near the university and other entertainment, restaurants and supermarkets.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>Binh Thanh, Ho Chi Minh</span>
                            </div>
                            <h4>Contemporary home with designer finishes</h4>
                            <p>Minimal decor but having several services near the house such as: dining, shopping etc.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>Thu Duc, Ho Chi Minh</span>
                            </div>
                            <h4>Spacious townhouse in a vibrant neighborhood</h4>
                            <p>Have a park for jogging, walking and a superior gym with personal trainers.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>District 9, Ho Chi Minh</span>
                            </div>
                            <h4>Peaceful house in a nature-filled setting</h4>
                            <p>Nestled in nature, while still being within a short commute to the city centre.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>Phu My Hung, Ho Chi Minh</span>
                            </div>
                            <h4>Stylish apartment in the heart of the city</h4>
                            <p>Offering convenient access to shops, restaurants and entertaiment</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm4.png" alt="">
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
                                <span>Go Vap, Ho Chi Minh</span>
                            </div>
                            <h4>Unique house with stunning architectural features</h4>
                            <p>Near the city centre, offer the convenience of proximity to urban amenities.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                </div>
                <div class="listings-list-booking">
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <img src="./images/hcm5.png" alt="">
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
                                <img src="./images/hcm5.png" alt="">
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
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>District 2, Ho Chi Minh</span>
                            </div>
                            <h4>Cosy and affordable: Quaint bungalow in a quiet neighborhood</h4>
                            <p>Easy access to shopping, dining and various entertainment options.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>Thao Dien, Ho Chi Minh</span>
                            </div>
                            <h4>Fully furnished apartment near main campus</h4>
                            <p>Near the university and other entertainment, restaurants and supermarkets.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>Binh Thanh, Ho Chi Minh</span>
                            </div>
                            <h4>Contemporary home with designer finishes</h4>
                            <p>Minimal decor but having several services near the house such as: dining, shopping etc.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>Thu Duc, Ho Chi Minh</span>
                            </div>
                            <h4>Spacious townhouse in a vibrant neighborhood</h4>
                            <p>Have a park for jogging, walking and a superior gym with personal trainers.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>District 9, Ho Chi Minh</span>
                            </div>
                            <h4>Peaceful house in a nature-filled setting</h4>
                            <p>Nestled in nature, while still being within a short commute to the city centre.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>Phu My Hung, Ho Chi Minh</span>
                            </div>
                            <h4>Stylish apartment in the heart of the city</h4>
                            <p>Offering convenient access to shops, restaurants and entertaiment</p>
                        </div>
                        <button>Book now</button>
                    </div>
                    <div class="list-box">
                        <div class="lr-box">
                            <div class="upper-img">
                                <img src="./images/hcm5.png" alt="">
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
                                <span>Go Vap, Ho Chi Minh</span>
                            </div>
                            <h4>Unique house with stunning architectural features</h4>
                            <p>Near the city centre, offer the convenience of proximity to urban amenities.</p>
                        </div>
                        <button>Book now</button>
                    </div>
                </div> -->
                <div class="pagination">
                    <img src="./images/Vector-1.png" alt="" id="vector1">
                    <p class="pagi">1</p>
                    <p class="pagi">2</p>
                    <p class="pagi">3</p>
                    <p class="pagi">4</p>
                    <p class="pagi">5</p>
                    <img src="./images/Vector-2.png" alt="" id="vector2">
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-top">
            <div class="contact-us">
                <h4>Contact-us</h4>
                <div class="address">
                    <img src="./images/pin2.png" alt="">
                    <p>01 Độc Lập, Quán Thánh, Ba Đình, Hà Nội</p>
                </div>
                <div class="phone-number">
                    <img src="./images/phone.png" alt="">
                    <p>080 41532</p>
                </div>
                <div class="email">
                    <img src="./images/email.png" alt="">
                    <p>21011601@st.phenikaa-uni.edu.vn</p>
                </div>
            </div>
            <div class="company">
                <h4>About Travel experience</h4>
                <p><a href="#">Booking</a></p>
                <p><a href="#">Contact us</a></p>
                <p><a href="#">Recruitment</a></p>
                <p><a href="#">About us</a></p>
            </div>
            <div class="Other">
                <h4>Other</h4>
                <p><a href="#">Travel experience Affiliate</a></p>
                <p><a href="#">Privacy policy</a></p>
                <p><a href="#">Terms and condition</a></p>
                <p><a href="#">Operating regulations</a></p>
            </div>
        </div>
        <div class="footer-bottom">
            <img src="./images/copyright.png" alt="" id="copyright">
            <img src="./images/logo.png" alt="" id="logo-footer">
            <div class="media">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
            <div id="go-to-top"><i class="fa-solid fa-angle-up"></i></div>
        </div>
    </div>

    <script src="{{ asset('assets/js/listings.js') }}"></script>

</body>
</html>