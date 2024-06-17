$(document).ready(function() {
    $("#go-to-top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const clicks = document.querySelectorAll('.section2 #show-voucher');
    const voucherMain = document.querySelector('.section2 .voucher-main');

    clicks.forEach(click => {
        click.addEventListener('click', function (event) {
            event.preventDefault();

            if (voucherMain.style.maxHeight === '0px' || voucherMain.style.maxHeight === '') {
                voucherMain.style.display= 'block';
                voucherMain.style.maxHeight = voucherMain.scrollHeight + 'px';
            } else {
                voucherMain.style.maxHeight = '0';
                setTimeout(() => {
                    voucherMain.style.display = 'none';
                }, 200);
            }
        });
    });
});

function validateForm() {
    var fields = ['email', 'name', 'address', 'phone'];
    var errorMessages = {
        'email': 'Please enter your email.',
        'name': 'Please enter your name.',
        'address': 'Please enter your address.',
        'phone': 'Please enter your phone number.'
    };

    for (var i = 0; i < fields.length; i++) {
        var fieldValue = document.getElementById(fields[i]).value.trim();
        if (!fieldValue) {
            alert(errorMessages[fields[i]]);
            return false;
        }
    }

    return true;
}

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.success-message')) {
        document.querySelector('.section2').style.display = 'none';
    }
});
