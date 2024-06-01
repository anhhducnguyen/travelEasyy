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

function submitForm() {
    const form = document.getElementById('registerForm');
    const formData = new FormData(form);

    fetch('/register', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => {
        if (response.status === 201) {
            console.log('Đăng ký thành công!');
        } else if (response.status === 400) {
            console.error('Email đã tồn tại!');
        } else {
            console.error('Đã xảy ra lỗi. Vui lòng thử lại.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}