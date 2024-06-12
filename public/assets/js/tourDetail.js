$(document).ready(function() {
    $("#go-to-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
});

const naviToListings = document.getElementById("view-all-ls");
naviToListings.addEventListener("click", () => {
    window.location.href = "W04-listings.html";
});

const paragraph = document.getElementById("para-text");
const hideAndShow = document.getElementById("hide-and-show-text");
let isExpanded = false;
hideAndShow.addEventListener("click", () => {
    if(isExpanded) {
        paragraph.style.webkitLineClamp = "5";
        hideAndShow.innerText = "Show more";
    }else {
        paragraph.style.webkitLineClamp = "unset";
        hideAndShow.innerText = "Hide";
    }
    isExpanded = !isExpanded;
})

// const faqBoxes = document.querySelectorAll(".faq-box");
    
// faqBoxes.forEach(function(faqBox) {
//     const icon = faqBox.querySelector("i");
//     icon.addEventListener("click", function() {
//         const content = faqBox.querySelector(".content-faq");
//         const headerFaq = faqBox.querySelector(".header-faq");
//         const isExpanded = content.style.display !== "none";
        
//         if (isExpanded) {
//             content.style.display = "none";
//             icon.classList.replace("fa-minus", "fa-plus");
//             headerFaq.style.marginBottom = "0";
//         } else {
//             content.style.display = "block";
//             icon.classList.replace("fa-plus", "fa-minus");
//             headerFaq.style.marginBottom = "15px";
//             faqBox.style.alignItems = "normal"
//         }
//     });
// });

$(document).ready(function() {
    $(".faq-box i").click(function() {
        var content = $(this).parent().next(".content-faq");

        if (content.is(":visible")) {
            content.slideUp();
            $(this).removeClass("fa-minus").addClass("fa-plus");
        } else {
            content.slideDown();
            $(this).removeClass("fa-plus").addClass("fa-minus");
        }
    });
});

