// Khai báo các biến cần thiết
const articles = document.querySelectorAll('.article');
const pagi = document.querySelectorAll('.pagi');
const prevButton = document.querySelector('#vector1');
const nextButton = document.querySelector('#vector2');
const totalArticles = articles.length;
const itemsPerPage = 6;

const radioButtons = document.querySelectorAll('input[name="radio1"]');
const citySearchInput = document.getElementById('city-search');
const allButton = document.getElementById('all');
let currentPage = 0;

// Hàm hiển thị bài viết trên trang pageIndex
function showArContainer(pageIndex) {
    const startIndex = pageIndex * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;

    articles.forEach((article, index) => {
        if (index >= startIndex && index < endIndex) {
            article.style.display = 'block';
        } else {
            article.style.display = 'none';
        }
    });

    updatePage(pageIndex);
}

// Hàm cập nhật trạng thái phân trang
function updatePage(pageIndex) {
    pagi.forEach((page, index) => {
        page.classList.remove('active');
        if (index === pageIndex) {
            page.classList.add('active');
        }
    });
}

// Bắt sự kiện click vào từng trang
pagi.forEach((page, index) => {
    page.addEventListener('click', () => {
        showArContainer(index);
        currentPage = index;
    });
});

// Bắt sự kiện click vào nút Previous
prevButton.addEventListener('click', () => {
    currentPage = (currentPage - 1 + Math.ceil(totalArticles / itemsPerPage)) % Math.ceil(totalArticles / itemsPerPage);
    showArContainer(currentPage);
});

// Bắt sự kiện click vào nút Next
nextButton.addEventListener('click', () => {
    currentPage = (currentPage + 1) % Math.ceil(totalArticles / itemsPerPage);
    showArContainer(currentPage);
});

// Hiển thị trang đầu tiên khi tải trang
showArContainer(currentPage);

document.addEventListener('DOMContentLoaded', function() {
    // Xử lý khi người dùng chọn radio button
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            const selectedCity = this.value;
            filterToursByCity(selectedCity);
        });
    });

    // Xử lý khi người dùng nhập vào ô tìm kiếm thành phố
    citySearchInput.addEventListener('input', function() {
        const searchText = slugify(this.value.trim().toLowerCase());

        // Lọc các radio button theo nội dung tìm kiếm
        radioButtons.forEach(function(radio) {
            const label = slugify(radio.nextElementSibling.textContent.trim().toLowerCase());

            if (searchText === '' || label.includes(searchText)) {
                radio.parentNode.style.display = 'block';
            } else {
                radio.parentNode.style.display = 'none';
            }
        });

        // Lọc các bài viết theo nội dung tìm kiếm
        filterToursByCity(searchText);
    });

    // Xử lý khi người dùng chọn All
    allButton.addEventListener('change', function() {
        if (this.checked) {
            showAllArticles();
        }
    });

    // Hàm lọc tours theo thành phố được chọn
    function filterToursByCity(city) {
        articles.forEach(function(article) {
            const articleCity = slugify(article.querySelector('.ar_img span').textContent.trim().toLowerCase());

            if (city === 'all' || articleCity.includes(city)) {
                article.style.display = 'block';
            } else {
                article.style.display = 'none';
            }
        });
    }

    // Hàm hiển thị tất cả các bài viết khi chọn All
    function showAllArticles() {
        articles.forEach(function(article) {
            article.style.display = 'block';
        });
    }

    // Hàm tạo slug từ tên thành phố, bao gồm việc loại bỏ dấu tiếng Việt
    function slugify(text) {
        const from = "áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđ";
        const to = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyd";

        text = text.split('').map((char, i) => {
            const index = from.indexOf(char);
            return index !== -1 ? to[index] : char;
        }).join('');

        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Thay thế khoảng trắng bằng dấu gạch ngang
            .replace(/[^\w\-]+/g, '')       // Loại bỏ các ký tự không phải chữ cái, số, dấu gạch ngang
            .replace(/\-\-+/g, '-')         // Thay thế nhiều dấu gạch ngang liên tiếp bằng một dấu gạch ngang
            .replace(/^-+/, '')             // Loại bỏ dấu gạch ngang ở đầu chuỗi
            .replace(/-+$/, '');            // Loại bỏ dấu gạch ngang ở cuối chuỗi
    }

    // Hiển thị trang đầu tiên khi tải trang
    showArContainer(currentPage);
});
