<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7b9d8c4ddc.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travel Easy</title>
</head>
<body>
    <div class="main">
<!-- =====================================================HEADER============================================================= -->
        <div class="header">
        <div class="header-top">
            <a href="W01-home.html"><img src="../../../assets/images/logo.png" alt=""></a>
            <div class="search-bar-looking-for">
                <input type="search" name="" id="" placeholder="What are you looking for?">
                <img src="../../../assets/images/loupe 1.png" alt="">
            </div>
            <div class="home-listings-blog">
                <a href="W01-home.html" id="home">Home</a>
                <a href="W04-listings.html" id="listings">Listings</a>
                <a href="{{route('register')}}" id="blog">Blog</a>
                <!-- <a href="#" id="a_login" onclick="document.querySelector('.modal-search').style.display='block'">Login</i></a> -->
                <a href="#" id="a_login" onclick="document.querySelector('.modal-search').style.display='block'">Login</a>
                <a href="#" id="a_register" onclick="document.querySelector('.modal').style.display='block'">Register</a>
                <a href="#" id="user-name"></a>
                <!-- <a href="#" id="a_logout" style="display:none;">Logout</a> -->
            </div>
        </div>
        <div class="header-mid">
            <h1>Explore Amazing Destinations</h1>
            <p>Find great places to stay, eat, shop, or visit from local experts.</p>
            <div class="search-bar-check">
                <div class="input-search where">
                    <p>Where</p>
                    <input type="text" name="where" id="where" placeholder="Where are you going">
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
                    <input type="text" name="guest=" id="guest" placeholder="Add guest">
                </div>
                <img src="../../../assets/images/icon.png" alt="">
            </div>
        </div>
    </div>
<!-- =====================================================END HEADER========================================================= -->

<!-- =====================================================CONTENT============================================================ -->
    <div class="content">
        <div class="exclusive">    
            <h3>Exclusive deals</h3>
            <p>Discover some of the most popular listings in Vietnam based on user reviews and ratings</p>
        </div>
        <div class="listings-ratings">
            <div class="prev-button"><i class="fa-solid fa-angle-left"></i></div>
            <div class="box-group">
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr1.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$150/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_25.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile1.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Sai Gon, Ho Chi Minh City</span>
                        </div>
                        <h4>Cheerful 1-bedroom in a townhouse with parking.</h4>
                        <p>This unique place has all a style all its own, pets allowed and only 25 mins to the city centre.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr2.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$100/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_15.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile2.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Quang Nam, Hoi An</span>
                        </div>
                        <h4>Ventilated area surrounded by beautiful gardens and barbeque allowed</h4>
                        <p>Near the Hoi An ancient town and other tourist attractions, motorcycle for rent with cheap price.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr3.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt=""class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Tay Ho, Ha Noi</span>
                        </div>
                        <h4>Nice homestay with double bed and smoke-free balcony.</h4>
                        <p>Free wifi access, gym and swimming pool free entrance, a supermarket below the resident area.</p>
                    </div>
                    <button>Book now</button>
                </div>
            </div>
            <div class="box-group">
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr1.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$150/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_25.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile1.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Sai Gon, Ho Chi Minh City</span>
                        </div>
                        <h4>Cheerful 1-bedroom in a townhouse with parking.</h4>
                        <p>This unique place has all a style all its own, pets allowed and only 25 mins to the city centre.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr1.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$150/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_25.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile1.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Sai Gon, Ho Chi Minh City</span>
                        </div>
                        <h4>Cheerful 1-bedroom in a townhouse with parking.</h4>
                        <p>This unique place has all a style all its own, pets allowed and only 25 mins to the city centre.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr1.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$150/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_25.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile1.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Sai Gon, Ho Chi Minh City</span>
                        </div>
                        <h4>Cheerful 1-bedroom in a townhouse with parking.</h4>
                        <p>This unique place has all a style all its own, pets allowed and only 25 mins to the city centre.</p>
                    </div>
                    <button>Book now</button>
                </div>
            </div>
            <div class="box-group">
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr2.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$100/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_15.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile2.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Quang Nam, Hoi An</span>
                        </div>
                        <h4>Ventilated area surrounded by beautiful gardens and barbeque allowed</h4>
                        <p>Near the Hoi An ancient town and other tourist attractions, motorcycle for rent with cheap price.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr2.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$100/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_15.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile2.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Quang Nam, Hoi An</span>
                        </div>
                        <h4>Ventilated area surrounded by beautiful gardens and barbeque allowed</h4>
                        <p>Near the Hoi An ancient town and other tourist attractions, motorcycle for rent with cheap price.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/imagelr2.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$100/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_15.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile2.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Quang Nam, Hoi An</span>
                        </div>
                        <h4>Ventilated area surrounded by beautiful gardens and barbeque allowed</h4>
                        <p>Near the Hoi An ancient town and other tourist attractions, motorcycle for rent with cheap price.</p>
                    </div>
                    <button>Book now</button>
                </div>
            </div>
            <div class="box-group">
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm1.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>District 1, Ho Chi Minh</span>
                        </div>
                        <h4>Spacious family home with modern amenities</h4>
                        <p>Located in a vibrant neighbourhood, near an array of trendy shops, restaurants, cafe etc.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm2.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>District 1, Ho Chi Minh</span>
                        </div>
                        <h4>Serene house with breathtaking lakeviews</h4>
                        <p>Enjoy the view straight from the dining room, and also only 15 mins downtown.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm3.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>District 3, Ho Chi Minh</span>
                        </div>
                        <h4>Elegant house with panoramic views</h4>
                        <p>Offering breathtaking skyline view and close proximity to high-end shopping mall.</p>
                    </div>
                    <button>Book now</button>
                </div>
            </div>
            <div class="box-group">
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm4.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>District 2, Ho Chi Minh</span>
                        </div>
                        <h4>Cosy and affordable: Quaint bungalow in a quiet neighborhood</h4>
                        <p>Easy access to shopping, dining and various entertainment options.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm5.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Thao Dien, Ho Chi Minh</span>
                        </div>
                        <h4>Fully furnished apartment near main campus</h4>
                        <p>Near the university and other entertainment, restaurants and supermarkets.</p>
                    </div>
                    <button>Book now</button>
                </div>
                <div class="box-of-lr">
                    <div class="lr-box">
                        <div class="upper-img">
                            <img src="../../../assets/images/hcm6.png" alt="">
                        </div>
                        <div class="price">
                            <a href="">$120/ night</a>
                        </div>
                        <div class="icon-heart">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        <img src="../../../assets/images/star_9.png" alt="" class="star-ratings">
                        <img src="../../../assets/images/profile3.png" alt="" class="profile-lr">
                    </div>
                    <div class="desc-of-lr">
                        <div class="location">
                            <img src="../../../assets/images/pin.png" alt="">
                            <span>Binh Thanh, Ho Chi Minh</span>
                        </div>
                        <h4>Contemporary home with designer finishes</h4>
                        <p>Minimal decor but having several services near the house such as: dining, shopping etc.</p>
                    </div>
                    <button>Book now</button>
                </div>
            </div>
            <div class="next-button"><i class="fa-solid fa-angle-right"></i></div>
        </div>
        <div class="dot-page">
            <p class="dot-ls"></p>
            <!-- <p class="dot-black"></p> -->
            <p class="dot-ls"></p>
            <p class="dot-ls"></p>
            <p class="dot-ls"></p>
            <p class="dot-ls"></p>
        </div>
        <div class="trending-cities">
            <h3>Trending Citites</h3>
            <p>Cities you must explore this summer</p>
        </div>
        <div class="tc-images">
            <div class="upper-tc">
                <div class="hg-hcm">
                    <div class="tc-img">
                        <img src="../../../assets/images/tc_img1.png" alt="tc1">
                    </div>
                    <div class="desc-tc">
                        <h4>Ha Giang</h4>
                        <p>62 Listings</p>
                    </div>
                </div>
                <div class="dn-hlb">
                    <div class="tc-img">
                        <img src="../../../assets/images/tc_img2.png" alt="tc2">
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
                        <img src="../../../assets/images/tc_img3.png" alt="tc3">
                    </div>
                    <div class="desc-tc">
                        <h4>Ha Long Bay</h4>
                        <p>86 Listings</p>
                    </div>
                </div>
                <div class="hg-hcm" id="hcm-ls">
                    <div class="tc-img">
                        <img src="../../../assets/images/tc_img4.png" alt="tc4">
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
                    <img src="../../../assets/images/find-location.png" alt="">
                </div>
                <div class="desc-img-hw">
                    <h4>Find accomodation</h4>
                    <p>Explore and engage with exceptional nearby accomodations, immersing yourself in the authentic local liftstyle.</p>
                </div>
            </div>
            <div class="explain-box">
                <div class="hw-img">
                    <img src="../../../assets/images/comment.png" alt="">
                </div>
                <div class="desc-img-hw">
                    <h4>Review Listings</h4>
                    <p>Examine the listings of accomodations and choose your favorite one that provides excellent value for its price.</p>
                </div>
            </div>
            <div class="explain-box">
                <div class="hw-img">
                    <img src="../../../assets/images/date.png" alt="">
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
                <img src="../../../assets/images/review_img1.png" alt="">
                <h5>Quang</h5>
                <p>Ha Noi</p>
                <p>Quick and easy hotel booking with no cancellations fees. Highly recommended!</p>
            </div>
            <div class="review-box rw-box2">
                <span>“</span>
                <div id="review-position">
                    <img src="../../../assets/images/review_img2.png" alt="">
                    <h5>Viet</h5>
                    <p>Hai Phong</p>
                    <p>The best booking site i've ever used. Instant confirmation, competitve prices and hassle-free cancellations.</p>
                </div>
            </div>
            <div class="review-box rw-box3">
                <img src="../../../assets/images/review_img3.png" alt="">
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
            <div class="article">
                <div class="ar_img ar1">
                    <img src="../../../assets/images/ar_1-1.png" alt="">
                    <span>Quang Binh</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">Bao Ngoc</span>
                <i class="fa-regular fa-calendar"></i>
                <span>06 April, 2022</span>
                <h4>Explore the UNESCO World Heritage largest cave of Vietnam</h4>
            </div>
            <div class="article">
                <div class="ar_img ar2">
                    <img src="../../../assets/images/ar_1-2.jpg" alt="">
                    <span>Hue</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">David</span>
                <i class="fa-regular fa-calendar"></i>
                <span>16 January, 2023</span>
                <h4>Check-in Hoa Dang Festival: Illuminating the night in Hue's splendor</h4>
            </div>
            <div class="article">
                <div class="ar_img ar3">
                    <img src="../../../assets/images/ar_1-3.png" alt="">
                    <span>Ha Noi</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">Chang Liao</span>
                <i class="fa-regular fa-calendar"></i>
                <span>28 March, 2022</span>
                <h4>Check out the extraordinary sight of Ha Noi's urban life</h4>
            </div>
            <div class="article" id="hcm-blog-detail">
                <div class="ar_img ar4">
                    <img src="../../../assets/images/ar_2-1.png" alt="">
                    <span>Ho Chi Minh</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">Sytske</span>
                <i class="fa-regular fa-calendar"></i>
                <span>26 April, 2020</span>
                <h4>Cafe Apartment-Discover the perfect blend of old-world charm</h4>
            </div>
            <div class="article">
                <div class="ar_img ar5">
                    <img src="../../../assets/images/ar_2-2.png" alt="">
                    <span>Sa Pa</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">Quoc Viet</span>
                <i class="fa-regular fa-calendar"></i>
                <span>12 April, 2023</span>
                <h4>Majestic Fansipan moutain: The rooftop of Vietnam</h4>
            </div>
            <div class="article">
                <div class="ar_img ar6">
                    <img src="../../../assets/images/ar_2-3.png" alt="">
                    <span>Binh Thuan</span>
                </div>
                <i class="fa-regular fa-user"></i>
                <span class="ar-name">Helmi</span>
                <i class="fa-regular fa-calendar"></i>
                <span>17 July, 2020</span>
                <h4>Don't miss Ta Cu mountain: A spiritual and natural oasis in Binh Thuan</h4>
            </div>
        </div>
        <button id="navi-to-blog">View all articles</button>
    </div>
<!-- ==================================================END CONTENT============================================================ -->

<!-- ===============================================FORM LOGIN AND REGISTER=================================================== -->
    <div class="modal">
        <div class="modal-inner">
            <div class="modal-header">
                <p>Create an account</p> <br>
                <i onclick="document.querySelector('.modal').style.display='none'" style="cursor: pointer;" class="fa-solid fa-xmark"></i>
            </div>

            <div class="modal-body">
                <form id="registerForm" action="/register" method="POST">
                    @csrf
                    <div class="modal-body-p">
                        <p class="modal-body-p1">Full name</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="text" id="name" name="name" required><br>
                    <!-- <div class="modal-body-p">
                        <p class="modal-body-p1">Phone</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="text" id="phone" name="phone" required><br> -->
                    <div class="modal-body-p">
                        <p class="modal-body-p1">Email address</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="email" id="email" name="email" required><br>
                    <div class="modal-body-p">
                        <p class="modal-body-p1">Password</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="password" id="password" name="password" required><br>
                    <button type="submit">Submit</button>
                    <div class="modal-footer">
                        <p>By providing your email & phone number you agree to direct marketing, including SMS. Consent is not a condition to purchase. You can unsubscribe any time.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal-search">
        <div class="modal-inner">
            <div class="modal-header">
                <p>Login</p> <br>
                <i onclick="document.querySelector('.modal-search').style.display='none'" style="cursor: pointer;" class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-body">
                <!-- <form action="/login" id="loginForm" method="POST">
                    @csrf
                    <div class="modal-body-p">
                        <p class="modal-body-p1">Email address</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="email" id="txtAccount" name="email" required>
                    <div class="modal-body-p">
                        <p class="modal-body-p1">Password</p>
                        <span>required</span>
                    </div>
                    <input class="modal-body-name" type="password" id="txtPassword" name="password" required>   
                    <button type="submit">Submit</button> 
                    <div class="modal-footer">
                        <p>By providing your email & phone number you agree to direct marketing, including SMS. Consent is not a condition to purchase. You can unsubscribe any time.</p>
                    </div>
                </form>  -->
                <form action="/login" method="POST" id="loginForm">
                @csrf
                <div class="modal-body-p">
                    <p class="modal-body-p1">Email address</p>
                    <span>required</span>
                </div>
                <input class="modal-body-name" type="email" name="email" required>
                <div class="modal-body-p">
                    <p class="modal-body-p1">Password</p>
                    <span>required</span>
                </div>
                <input class="modal-body-name" type="password" name="password" required>   
                <button type="submit">Submit</button> 
                <div class="modal-footer">
                    <p>By providing your email & phone number you agree to direct marketing, including SMS. Consent is not a condition to purchase. You can unsubscribe any time.</p>
                </div>
            </form> 
            </div>
        </div>
    </div>
<!-- ===============================================END FORM LOGIN AND REGISTER=============================================== -->

<!-- ==================================================FOOTER================================================================= -->
<div class="footer">
        <div class="footer-top">
            <div class="contact-us">
                <h4>Contact-us</h4>
                <div class="address">
                    <img src="../../../assets/images/pin2.png" alt="">
                    <p>01 Độc Lập, Quán Thánh, Ba Đình, Hà Nội</p>
                </div>
                <div class="phone-number">
                    <img src="../../../assets/images/phone.png" alt="">
                    <p>080 41532</p>
                </div>
                <div class="email">
                    <img src="../../../assets/images/email.png" alt="">
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
            <img src="../../../assets/images/copyright.png" alt="" id="copyright">
            <img src="../../../assets/images/logo.png" alt="" id="logo-footer">
            <div class="media">
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-x-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-linkedin-in"></i>
            </div>
            <div id="go-to-top"><i class="fa-solid fa-angle-up"></i></div>
        </div>
    </div>
<!-- ==================================================END FOOTER============================================================= -->
    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>
</html>