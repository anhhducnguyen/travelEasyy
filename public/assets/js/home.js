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


// Sử dụng flatpickr cho input chọn ngày
flatpickr("#checkIn", {
    dateFormat: "Y-m-d"
});
flatpickr("#checkOut", {
    dateFormat: "Y-m-d"
});

// =================================REGISTER===================================================================

// document.getElementById('registerForm').addEventListener('submit', function(event) {
//     event.preventDefault();

//     let formData = new FormData(this);

//     fetch('/register', {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             'Accept': 'application/json'
//         },
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.message === 'Đăng ký thành công!') {
//             alert('Đăng ký thành công!');
//             this.reset();
//             document.querySelector('.modal').style.display = 'none';
//         } else {
//             alert('Đăng ký thất bại: ' + data.message);
//         }
//     })
//     .catch(error => {
//         console.error('Error:', error);
//         alert('Có lỗi xảy ra, vui lòng thử lại sau.');
//     });
// });
// =================================END REGISTER===================================================================

// =================================LOGIN==========================================================================

// document.getElementById('loginForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     let formData = new FormData(this);

//     fetch('/login', {
//         method: 'POST',
//         headers: {
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//             'Accept': 'application/json'
//         },
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.message === 'Đăng nhập thành công!') {
//             alert(data.name + ' đã đăng nhập thành công!');
//             this.reset();
//             document.getElementById('a_login').style.display = 'none';
//             document.getElementById('user-name').textContent = 'Welcome, ' + data.name;
//             document.querySelector('.modal-search').style.display = 'none';
//             // document.getElementById('a_logout').style.display = 'block';
//             document.getElementById('a_register').style.display = 'none';

//         } else {
//             alert('Đăng nhập thất bại: ' + data.message);
//         }
//     })
//     .catch(error => {
//         console.error('Error:', error);
//         alert('Có lỗi xảy ra, vui lòng thử lại sau.');
//     });
// });


// document.getElementById('loginForm').addEventListener('submit', function(event) {
//             event.preventDefault();
//             let formData = new FormData(this);

//             fetch('/login', {
//                 method: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//                     'Accept': 'application/json'
//                 },
//                 body: formData
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.message === 'Đăng nhập thành công!') {
//                     alert(data.name + ' đã đăng nhập thành công!');
//                     this.reset();
//                     document.getElementById('a_login').style.display = 'none';
//                     document.getElementById('user-name').textContent = 'Welcome, ' + data.name;
//                     document.querySelector('.modal-search').style.display = 'none';
//                     document.getElementById('a_register').style.display = 'none';
//                 } else {
//                     alert('Đăng nhập thất bại: ' + data.message);
//                 }
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//                 alert('Có lỗi xảy ra, vui lòng thử lại sau.');
//             });
//         });
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch('/login', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            let userName = data.user.name;
            alert(userName + ' đã đăng nhập thành công!');
            this.reset();
            document.getElementById('a_login').style.display = 'none';
            document.getElementById('user-name').textContent = 'Welcome, ' + userName;
            document.querySelector('.modal-search').style.display = 'none';
            document.getElementById('a_register').style.display = 'none';
        } else {
            alert('Đăng nhập thất bại: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
    });
});

// =================================END LOGIN===================================================================

// ====================================ACCOUNT==================================================================
// document.getElementById('user-name').addEventListener('click', function(event){
//     event.preventDefault();
//     // alert('hello');
//     window.location.href = '/account';
// });
// ====================================END ACCOUNT==============================================================

