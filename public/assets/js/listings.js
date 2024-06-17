// $(document).ready(function() {
//     $("#go-to-top").click(function() {
//         $("html, body").animate({ scrollTop: 0 }, 1000);
//     });
// });

// // pagination

// const Listings_book = document.querySelectorAll(".listings-list-booking");
// const pagi = document.querySelectorAll(".pagi");

// let currentIndex = 0;

// function showListingsBook(index) {
//     Listings_book.forEach((container) => {
//         container.style.display = "none";
//     });
//     Listings_book[index].style.display = "grid";
//     Listings_book[index].style.gridTemplateColumns = "repeat(2, 1fr)";
//     Listings_book[index].style.gridGap = "20px";
//     updatePage(index);
// }

// function updatePage(index) {
//     pagi.forEach((page, pageIndex) => {
//         page.classList.remove("active");
//         if (pageIndex === index) {
//             page.style.backgroundColor = "#234DD4";
//             page.style.borderRadius = "50%";
//             page.style.color = "white"
//         } else {
//             page.style.backgroundColor = "transparent";
//             page.style.borderRadius = "50%";
//             page.style.color = "black"
//         }
//     });
//     pagi[index].classList.add("active");
// }

// pagi.forEach((page, index) => {
//     page.addEventListener("click", () => {
//         showListingsBook(index);
//         currentIndex = index;
//     });
// });

// const prevButton = document.querySelector("#vector1");
// const nextButton = document.querySelector("#vector2");

// prevButton.addEventListener("click", () => {
//     currentIndex = (currentIndex - 1 + Listings_book.length) % Listings_book.length;
//     showListingsBook(currentIndex);
// });

// nextButton.addEventListener("click", () => {
//     currentIndex = (currentIndex + 1) % Listings_book.length;
//     showListingsBook(currentIndex);
// });

// showListingsBook(currentIndex);

// const naviToListingsDetail = document.getElementById("navi-to-ls-detail");
// naviToListingsDetail.addEventListener("click", () => {
//     window.location.href = tourDetailUrl;
    
// });

// const boxOfLrElements = document.querySelectorAll(".list-box");

// boxOfLrElements.forEach((boxOfLr) => {
//     boxOfLr.style.cursor = "pointer";
//     boxOfLr.addEventListener("click", () => {
//         // const listingUrl = boxOfLr.getAttribute("data-listing-url");

//         // Điều hướng đến trang web chi tiết
//         window.location.href = tourDetailUrl;
//     });
// });

// listings.js

// $(document).ready(function() {
//     // Function to handle search input
//     $("#tour_search").on("input", function() {
//         let searchTerm = $(this).val().trim().toLowerCase();
//         filterListings(searchTerm);
//     });

//     // Function to filter listings based on search term
//     function filterListings(searchTerm) {
//         $(".list-box").each(function() {
//             let tourName = $(this).find("h4").text().toLowerCase();
//             if (tourName.includes(searchTerm)) {
//                 $(this).show();  // Show the listing if the tour name matches search term
//             } else {
//                 $(this).hide();  // Hide the listing if it does not match
//             }
//         });
//     }
// });


// // listings.js

// $(document).ready(function() {
//     // Function to handle price range selection
//     $("#price_range_select").change(function() {
//         filterListingsByPriceRange($(this).val());
//     });

//     // Function to filter listings by price range
//     function filterListingsByPriceRange(range) {
//         $(".list-box").each(function() {
//             let tourPrice = parseFloat($(this).find(".price a").text().replace('$', '').replace('.', ''));
//             let showListing = false;

//             switch (range) {
//                 case 'all':
//                     showListing = true;  // Show all listings if 'All' is selected
//                     break;
//                 case 'low':
//                     if (tourPrice < 1000) {  // Adjust this threshold based on your price categories
//                         showListing = true;
//                     }
//                     break;
//                 case 'medium':
//                     if (tourPrice >= 1000 && tourPrice <= 5000) {  // Adjust these thresholds based on your price categories
//                         showListing = true;
//                     }
//                     break;
//                 case 'high':
//                     if (tourPrice > 5000) {  // Adjust this threshold based on your price categories
//                         showListing = true;
//                     }
//                     break;
//                 default:
//                     showListing = true;  // Show by default if no range is selected
//                     break;
//             }

//             // Show or hide the listing based on the showListing flag
//             if (showListing) {
//                 $(this).show();
//             } else {
//                 $(this).hide();
//             }
//         });
//     }
// });

// // listings.js

// $(document).ready(function() {
//     // Function to handle sorting selection
//     $("#sort_by").change(function() {
//         let sortBy = $(this).val();
//         sortListings(sortBy);
//     });

//     // Function to sort listings
//     function sortListings(sortBy) {
//         let listingsContainer = $(".listings-list-booking");
//         let listings = listingsContainer.children(".list-box");

//         switch (sortBy) {
//             case 'price_low_to_high':
//                 listings.sort(function(a, b) {
//                     let priceA = parseFloat($(a).find(".price a").text().replace('$', '').replace('.', ''));
//                     let priceB = parseFloat($(b).find(".price a").text().replace('$', '').replace('.', ''));
//                     return priceA - priceB;
//                 });
//                 break;
//             case 'price_high_to_low':
//                 listings.sort(function(a, b) {
//                     let priceA = parseFloat($(a).find(".price a").text().replace('$', '').replace('.', ''));
//                     let priceB = parseFloat($(b).find(".price a").text().replace('$', '').replace('.', ''));
//                     return priceB - priceA;
//                 });
//                 break;
//             case 'default':
//             default:
//                 // Do nothing, maintain default order
//                 break;
//         }

//         listings.detach().appendTo(listingsContainer);
//     }
// });

// =====================================================================================


// $(document).ready(function() {
//     // Search functionality
//     $("#tour_search").on("input", function() {
//         let searchTerm = $(this).val().trim().toLowerCase();
//         filterListings(searchTerm);
//     });

//     function filterListings(searchTerm) {
//         $(".list-box").each(function() {
//             let tourName = $(this).find("h4").text().toLowerCase();
//             if (tourName.includes(searchTerm)) {
//                 $(this).show();
//             } else {
//                 $(this).hide();
//             }
//         });
//         paginateListings(0); // Reset to first page after filtering
//     }

//     // Price range filter
//     $("#price_range_select").change(function() {
//         filterListingsByPriceRange($(this).val());
//     });

//     function filterListingsByPriceRange(range) {
//         $(".list-box").each(function() {
//             let tourPrice = parseFloat($(this).find(".price a").text().replace('$', '').replace('.', ''));
//             let showListing = false;

//             switch (range) {
//                 case 'all':
//                     showListing = true;
//                     break;
//                 case 'low':
//                     if (tourPrice < 1000) showListing = true;
//                     break;
//                 case 'medium':
//                     if (tourPrice >= 1000 && tourPrice <= 5000) showListing = true;
//                     break;
//                 case 'high':
//                     if (tourPrice > 5000) showListing = true;
//                     break;
//                 default:
//                     showListing = true;
//                     break;
//             }

//             if (showListing) {
//                 $(this).show();
//             } else {
//                 $(this).hide();
//             }
//         });
//         paginateListings(0); // Reset to first page after filtering
//     }

//     // Sorting functionality
//     $("#sort_by").change(function() {
//         let sortBy = $(this).val();
//         sortListings(sortBy);
//     });

//     function sortListings(sortBy) {
//         let listingsContainer = $(".listings-list-booking");
//         let listings = listingsContainer.children(".list-box");

//         listings.sort(function(a, b) {
//             let priceA = parseFloat($(a).find(".price a").text().replace('$', '').replace('.', ''));
//             let priceB = parseFloat($(b).find(".price a").text().replace('$', '').replace('.', ''));
//             return sortBy === 'price_low_to_high' ? priceA - priceB : priceB - priceA;
//         });

//         listings.detach().appendTo(listingsContainer);
//         paginateListings(0); // Reset to first page after sorting
//     }

//     // Pagination functionality
//     const listingsPerPage = 6;
//     const Listings_book = $(".list-box");
//     const pagi = $(".pagi");

//     function paginateListings(pageIndex) {
//         Listings_book.hide();
//         let start = pageIndex * listingsPerPage;
//         let end = start + listingsPerPage;
//         Listings_book.slice(start, end).show();
//         updatePage(pageIndex);
//     }

//     function updatePage(index) {
//         pagi.each(function(pageIndex) {
//             if (pageIndex === index) {
//                 $(this).css({ "background-color": "#234DD4", "border-radius": "50%", "color": "white" });
//             } else {
//                 $(this).css({ "background-color": "transparent", "border-radius": "50%", "color": "black" });
//             }
//         });
//     }

//     pagi.each(function(index) {
//         $(this).click(function() {
//             paginateListings(index);
//         });
//     });

//     $("#vector1").click(function() {
//         let currentIndex = pagi.filter(function() {
//             return $(this).css("background-color") === "rgb(35, 77, 212)";
//         }).index();
//         let newIndex = (currentIndex - 1 + pagi.length) % pagi.length;
//         paginateListings(newIndex);
//     });

//     $("#vector2").click(function() {
//         let currentIndex = pagi.filter(function() {
//             return $(this).css("background-color") === "rgb(35, 77, 212)";
//         }).index();
//         let newIndex = (currentIndex + 1) % pagi.length;
//         paginateListings(newIndex);
//     });

//     paginateListings(0); // Show first page by default
// });


$(document).ready(function() {
    // Search functionality
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
        paginateListings(0); // Reset to first page after filtering
    }

    // Price range filter
    $("#price_range_select").change(function() {
        filterListingsByPriceRange($(this).val());
    });

    function filterListingsByPriceRange(range) {
        $(".list-box").each(function() {
            let tourPrice = parseFloat($(this).find(".price a").text().replace('$', '').replace('.', ''));
            let showListing = false;

            switch (range) {
                case 'all':
                    showListing = true;
                    break;
                case 'low':
                    if (tourPrice < 1000) showListing = true;
                    break;
                case 'medium':
                    if (tourPrice >= 1000 && tourPrice <= 5000) showListing = true;
                    break;
                case 'high':
                    if (tourPrice > 5000) showListing = true;
                    break;
                default:
                    showListing = true;
                    break;
            }

            if (showListing) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        paginateListings(0); // Reset to first page after filtering
    }

    // Sorting functionality
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
        paginateListings(0); // Reset to first page after sorting
    }

    // Pagination functionality
    const listingsPerPage = 6;
    const Listings_book = $(".list-box");
    const pagi = $(".pagi");

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
            paginateListings(index);
        });
    });

    $("#vector1").click(function() {
        let currentIndex = pagi.filter(function() {
            return $(this).css("background-color") === "rgb(35, 77, 212)";
        }).index();
        let newIndex = (currentIndex - 1 + pagi.length) % pagi.length;
        paginateListings(newIndex);
    });

    $("#vector2").click(function() {
        let currentIndex = pagi.filter(function() {
            return $(this).css("background-color") === "rgb(35, 77, 212)";
        }).index();
        let newIndex = (currentIndex + 1) % pagi.length;
        paginateListings(newIndex);
    });

    paginateListings(0); // Show first page by default
});
