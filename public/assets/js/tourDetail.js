$(document).ready(function() {
    $("#go-to-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
});

const paragraph = document.getElementById("para-text");
const hideAndShow = document.getElementById("hide-and-show-text");
let isExpanded = false;
hideAndShow.addEventListener("click", () => {
    if(isExpanded) {
        paragraph.style.webkitLineClamp = "4";
        hideAndShow.innerText = "Show more";
    }else {
        paragraph.style.webkitLineClamp = "unset";
        hideAndShow.innerText = "Hide";
    }
    isExpanded = !isExpanded;
})

document.addEventListener('DOMContentLoaded', function() {
    // Hiển thị 3 phần tử đầu tiên
    let listBoxes = document.querySelectorAll('.list-box');
    for (let i = 0; i < Math.min(3, listBoxes.length); i++) {
        listBoxes[i].classList.add('visible');
    }
});

function toggleListings() {
    let listBoxes = document.querySelectorAll('.list-box');
    let button = document.getElementById('view-all-ls');
    
    if (button.textContent === "View all listings") {
        listBoxes.forEach(box => box.classList.add('visible'));
        button.textContent = "Hide listings";
    } else {
        listBoxes.forEach((box, index) => {
            if (index >= 3) {
                box.classList.remove('visible');
            }
        });
        button.textContent = "View all listings";
    }
}




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

// Định nghĩa hàm tính toán tổng giá
function calculateTotal() {

    let basePrice = parseFloat(document.getElementById('basePrice').textContent);

    let serviceFee = parseFloat(document.getElementById('serviceFee').textContent);

    // Lấy số lượng khách từ input
    let guestCount = parseInt(document.getElementById('guestCount').value);

    if (isNaN(guestCount) || guestCount < 1) {
        guestCount = 1;
    }
    
    let totalPrice = basePrice * guestCount + serviceFee;


    document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);    
  
    document.getElementById('formTotalPrice').value = totalPrice.toFixed(2);

    document.getElementById('formGuestCount').value = guestCount;
}

document.getElementById('guestCount').addEventListener('input', calculateTotal);

calculateTotal();





