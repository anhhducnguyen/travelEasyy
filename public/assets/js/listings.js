
// search tour
$(document).ready(function() {
    $("#tour_search").on("input", function() {
        let searchTerm = $(this).val().trim().toLowerCase();
        filterListings(searchTerm);
    });

    function filterListings(searchTerm) {
        $(".list-box").each(function() {
            let tourName = $(this).find("h4").text().toLowerCase();
            if (tourName.includes(searchTerm)) {
                $(this).show();  
            } else {
                $(this).hide();  
            }
        });
    }
});

// listings.js
// Lọc danh sách theo khoảng giá
$(document).ready(function() {
    // Function to handle price range selection
    $("#price_range_select").change(function() {
        filterListingsByPriceRange($(this).val());
    });

    // Function to filter listings by price range
    function filterListingsByPriceRange(range) {
        $(".list-box").each(function() {
            let tourPrice = parseFloat($(this).find(".price a").text().replace('$', '').replace('.', ''));
            let showListing = false;

            switch (range) {
                case 'all':
                    showListing = true;  // Show all listings if 'All' is selected
                    break;
                case 'low':
                    if (tourPrice < 55) {  // Adjust this threshold based on your price categories
                        showListing = true;
                    }
                    break;
                case 'medium':
                    if (tourPrice >= 55 && tourPrice <= 70) {  // Adjust these thresholds based on your price categories
                        showListing = true;
                    }
                    break;
                case 'high':
                    if (tourPrice > 70) {  // Adjust this threshold based on your price categories
                        showListing = true;
                    }
                    break;
                default:
                    showListing = true;  // Show by default if no range is selected
                    break;
            }

            // Show or hide the listing based on the showListing flag
            if (showListing) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
});


$(document).ready(function() {
    let currentPageIndex = 0;
    const listingsPerPage = 6;
    const Listings_book = $(".list-box");
    const pagi = $(".pagi");

    // Chức năng tìm kiếm
    $("#tour_search").on("input", function() {
        let searchTerm = $(this).val().trim().toLowerCase();
        filterListings(searchTerm);
    });


    // Chức năng sắp xếp
    $("#sort_by").change(function() {
        let sortBy = $(this).val();
        sortListings(sortBy);
    });

    function sortListings(sortBy) {
        let listingsContainer = $(".listings-list-booking");
        let listings = listingsContainer.children(".list-box");

        listings.sort(function(a, b) {
            let priceA = parseFloat($(a).find(".price a").text().replace('$', '').replace('.', ''));
            let priceB = parseFloat($(b).find(".price a").text().replace('$', '').replace('.', ''));
            
            if (sortBy === 'price_low_to_high') {
                return priceA - priceB;
            } else if (sortBy === 'price_high_to_low') {
                return priceB - priceA;
            } else if (sortBy === 'price_low') {
                return priceA < 1000 ? -1 : 1;
            } else if (sortBy === 'price_medium') {
                return (priceA >= 1000 && priceA <= 5000) ? -1 : 1;
            } else if (sortBy === 'price_high') {
                return priceA > 5000 ? -1 : 1;
            }
        });

        listings.detach().appendTo(listingsContainer);
        paginateListings(0); // Reset lại trang đầu tiên sau khi sắp xếp
    }

    // Chức năng phân trang
    function paginateListings(pageIndex) {
        Listings_book.hide();
        let start = pageIndex * listingsPerPage;
        let end = start + listingsPerPage;
        Listings_book.slice(start, end).show();
        updatePage(pageIndex);
    }

    function updatePage(index) {
        pagi.each(function(pageIndex) {
            if (pageIndex === index) {
                $(this).css({ "background-color": "#234DD4", "border-radius": "50%", "color": "white" });
            } else {
                $(this).css({ "background-color": "transparent", "border-radius": "50%", "color": "black" });
            }
        });
    }

    pagi.each(function(index) {
        $(this).click(function() {
            currentPageIndex = index;
            paginateListings(index);
        });
    });

    // Nút chuyển trang trước
    $("#vector1").click(function() {
        if (currentPageIndex > 0) {
            currentPageIndex--;
        } else {
            currentPageIndex = pagi.length - 1; // Quay vòng về trang cuối
        }
        paginateListings(currentPageIndex);
    });

    // Nút chuyển trang sau
    $("#vector2").click(function() {
        if (currentPageIndex < pagi.length - 1) {
            currentPageIndex++;
        } else {
            currentPageIndex = 0; // Quay vòng về trang đầu
        }
        paginateListings(currentPageIndex);
    });

    paginateListings(0); // Hiển thị trang đầu tiên mặc định
});


// Lấy các phần tử từ DOM
const radiusSlider = document.getElementById('radius-slider');
const kilometerRange = document.getElementById('kilometer-range');

// Hàm cập nhật giá trị km
function updateKilometerRange() {
    kilometerRange.textContent = radiusSlider.value + ' km';
}

// Lắng nghe sự kiện thay đổi giá trị của thanh trượt
radiusSlider.addEventListener('input', updateKilometerRange);


