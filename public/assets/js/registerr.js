function validateForm(event) {
    event.preventDefault();
    var form = document.getElementById('registerForm');
    var name = form.name.value;
    var email = form.email.value;
    var password = form.password.value;
    var confirmPassword = form.confirmPassword.value;

    if (password.length < 8) {
        alert("Mật khẩu tối thiểu 8 ký tự");
        return false;
    }

    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/;

    if (!regex.test(password)) {
        alert("Mật khẩu phải bao gồm ít nhất một chữ cái viết hoa, một chữ cái viết thường và một số");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Mật khẩu bạn nhập không trùng nhau");
        return false;
    }

    form.submit();
}