$(document).ready(function() {
    $("#go-to-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
});

// pagination

const Listings_book = document.querySelectorAll(".listings-list-booking");
const pagi = document.querySelectorAll(".pagi");

let currentIndex = 0;

function showListingsBook(index) {
    Listings_book.forEach((container) => {
        container.style.display = "none";
    });
    Listings_book[index].style.display = "grid";
    Listings_book[index].style.gridTemplateColumns = "repeat(2, 1fr)";
    Listings_book[index].style.gridGap = "20px";
    updatePage(index);
}

function updatePage(index) {
    pagi.forEach((page, pageIndex) => {
        page.classList.remove("active");
        if (pageIndex === index) {
            page.style.backgroundColor = "#234DD4";
            page.style.borderRadius = "50%";
            page.style.color = "white"
        } else {
            page.style.backgroundColor = "transparent";
            page.style.borderRadius = "50%";
            page.style.color = "black"
        }
    });
    pagi[index].classList.add("active");
}

pagi.forEach((page, index) => {
    page.addEventListener("click", () => {
        showListingsBook(index);
        currentIndex = index;
    });
});

const prevButton = document.querySelector("#vector1");
const nextButton = document.querySelector("#vector2");

prevButton.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + Listings_book.length) % Listings_book.length;
    showListingsBook(currentIndex);
});

nextButton.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % Listings_book.length;
    showListingsBook(currentIndex);
});

showListingsBook(currentIndex);

const naviToListingsDetail = document.getElementById("navi-to-ls-detail");
naviToListingsDetail.addEventListener("click", () => {
    window.location.href = tourDetailUrl;
    
});

const boxOfLrElements = document.querySelectorAll(".list-box");

boxOfLrElements.forEach((boxOfLr) => {
    boxOfLr.style.cursor = "pointer";
    boxOfLr.addEventListener("click", () => {
        // const listingUrl = boxOfLr.getAttribute("data-listing-url");

        // Điều hướng đến trang web chi tiết
        window.location.href = tourDetailUrl;
    });
});

