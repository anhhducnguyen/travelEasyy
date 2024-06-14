<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listings Detail</title>
    <link rel="stylesheet" href={{ asset('assets/css/tourDetail.css') }}>
    <script src="https://kit.fontawesome.com/1214d8ad52.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="./images/logo_web.ico" type="image/x-icon">
</head>
<body>
    <div class="header">
        <a href="W01-home.html"><img src="./images/logo.png" alt=""></a>
        <div class="search-bar-looking-for">
            <input type="search" name="" id="" placeholder="What are you looking for?">
            <img src="./images/loupe 1.png" alt="">
        </div>
        <div class="home-listings-blog">
            <a href="W01-home.html" id="home">Home</a>
            <a href="W04-listings.html" id="listings">Listings</a>
            <a href="W02-blog.html" id="blog">Blog</a>
            <a href="" id="log-in">Log in</a>
            <a href="" id="register">Register</a>
        </div>
    </div>
    <div class="content">
        <div class="content-header-listings">
            <div class="left-ct-header">
                <img src="./images/profile-detail.png" alt="">
                <div class="desc-profile">
                    <h4>Duc Hai</h4>
                    <div class="phone-location">
                        <img src="./images/phone-icon.png" alt="" id="phone-icon">
                        <span>+61-8181-123</span>
                        <img src="./images/pin.png" alt="" id="pin-icon">
                        <span>Nha Trang</span>
                        <img src="./images/rating-listings-star.png" alt="" id="star-ratings">
                    </div>
                </div>
            </div>
            <div class="right-ct-header">
                <div class="upload-share-post">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                </div>
                <span>Share</span>
                <div class="save-post">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <span>Save</span>
            </div>
        </div>
        <div class="content-main-image">
            <div class="left-main-img">
                <img src="./images/listing-detail-img.png" alt="ls-detail">
            </div>
            <div class="right-small-image">
                <div class="img-small-desc">
                    <img src="images/right-img1.png" alt="Image 1">
                </div>
                <div class="img-small-desc">
                    <img src="images/right-img2.png" alt="Image 2">
                </div>
                <div class="img-small-desc">
                    <img src="images/right-img3.png" alt="Image 3">
                </div>
                <div class="img-small-desc">
                    <img src="images/right-img4.png" alt="Image 4">
                </div>
                <div class="img-small-desc">
                    <img src="images/right-img5.png" alt="Image 5">
                </div>
                <div class="img-small-desc">
                    <img src="images/right-img6.png" alt="Image 6">
                </div>
            </div>
        </div>
    </div>
    <div class="second-content">
        <div class="left-overview-content">
            <h5>Overview</h5>
            <div class="overview-hotel">
                <p class="paragraph" id="para-text">This beautiful residence offers convenience and luxury in a prime location. With four spacious bedrooms, three well-appointed bathrooms, a contemporary kitchen with sleek granite countertops, and a formal dining area, it's perfect for families who need ample space. The master suite is lavish with a walk-in closet and en-suite bathroom. <br>

                    Outside, a well-maintained backyard with a charming patio is ideal for relaxation and gatherings. This home also features an attached two-car garage and a dedicated laundry room with a washer and dryer for added convenience. <br>
                    
                    Don't miss out; schedule a viewing today at +61-8181-123 to turn your dream home into a reality with our eager team's help.</p>
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
            <img src="./images/video-listing-detail.png" alt="video-listing-detail" width="100%">
        </div>
        <div class="right-price-content">
            <div class="price-box-book">
                <span id="price-amount">$18</span>
                <span id="room-night"> / room / night(s)</span>
                <table>
                    <tr>
                      <th id="th-border">
                        <p class="cin-cout">CHECK - IN</p>
                        <p class="date-ch">6/1/2023</p>
                      </th>
                      <th>
                        <p class="cin-cout">CHECK - OUT</p>
                        <p class="date-ch">7/2/2023</p>
                      </th>
                    </tr>
                    <tr>
                      <td colspan="2" id="td-border">
                        <p>GUEST</p>
                        <p id="amount-guest">1 guest</p>
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
    <script src="tourDetail.js"></script>
</body>
</html>