// $(document).ready(function() {
//     $("#go-to-top").click(function() {
//         $("html, body").animate({ scrollTop: 0 }, 2000);
//     });
// });

// // control listings box
const boxGroups = document.querySelectorAll(".box-group");
const dots = document.querySelectorAll(".dot-ls");
// const listingsRatings = document.querySelector(".listings-ratings");
let currentIndex = 0;

function showBoxGroup(index) {
    boxGroups.forEach((group) => {
        group.style.display = "none";
    });
    boxGroups[index].style.display = "flex";
    boxGroups[index].style.gap = "20px";
    updateDots(index);
}
function updateDots(index) {
    dots.forEach((dot, dotIndex) => {
        dot.classList.remove("active");
        if (dotIndex === index) {
            dot.style.width = "15px";
            dot.style.height = "5px";
            dot.style.backgroundColor = "#222222";
            dot.style.borderRadius = "20px";
            dot.style.marginRight = "10px";
        } else {
            dot.style.width = "5px";
            dot.style.height = "5px";
            dot.style.backgroundColor = "#dedede";
            dot.style.borderRadius = "50%";
            dot.style.marginRight = "10px";
        }
    });
    dots[index].classList.add("active");
}

dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
        showBoxGroup(index);
        currentIndex = index;
    });
});
const prevButton = document.querySelector(".prev-button");
const nextButton = document.querySelector(".next-button");

prevButton.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + boxGroups.length) % boxGroups.length;
    showBoxGroup(currentIndex);
});

nextButton.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % boxGroups.length;
    showBoxGroup(currentIndex);
});

showBoxGroup(currentIndex);

// =================================REGISTER===================================================================

document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch('/register', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Đăng ký thành công!') {
            alert('Đăng ký thành công!');
            this.reset();
        } else {
            alert('Đăng ký thất bại: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
    });
});
// =================================END REGISTER===================================================================