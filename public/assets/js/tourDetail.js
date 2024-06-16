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
        paragraph.style.webkitLineClamp = "5";
        hideAndShow.innerText = "Show more";
    }else {
        paragraph.style.webkitLineClamp = "unset";
        hideAndShow.innerText = "Hide";
    }
    isExpanded = !isExpanded;
})

document.addEventListener('DOMContentLoaded', function() {
    var viewAllButton = document.getElementById('view-all-ls');
    var listBoxes = document.querySelectorAll('.list-box');

    // Ẩn các tour sau tour thứ 3 ban đầu
    for (var i = 3; i < listBoxes.length; i++) {
        listBoxes[i].style.display = 'none';
    }


    viewAllButton.addEventListener('click', function() {

        listBoxes.forEach(function(listBox) {
            listBox.style.display = 'block';
        });

        viewAllButton.style.display = 'none';
    });
});



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

    document.getElementById('basePrice').textContent = basePrice.toFixed(2);
    document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
}

document.getElementById('guestCount').addEventListener('input', calculateTotal);

calculateTotal();





