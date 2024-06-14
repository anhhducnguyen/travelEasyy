<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    <header id="header">
        <div class="logo"><a href="{{ route('index') }}">Travel Easy</a></div>
        <div class="hamburger" id="toggle">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar" id="navbar">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#product">Products</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="{{ route('password.change') }}">Change Password</a></li>
                <div class="login" id="login">
                    <li><a href="{{route('logout_up')}}" class="navlogin">Logout</a></li>
                </div>
            </ul>
        </nav>
    </header>
    <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Account Information</h1>
            </div>
            <form action="{{ route('updateProfile') }}" method="POST" id="registerForm" class="login-form" autocomplete="off">
                @csrf
                @if(Auth::check())
                <div class="login-content">
                    <div class="form-item">
                        <label for="text">Account code</label>
                        <input type="text" id="id_account" value="{{ Auth::user()->id }}" readonly>
                    </div>
                    <div class="form-item">
                        <label for="text">Full name</label>
                        <input type="text" id="name" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-item">
                        <label for="email">Enter Email</label>
                        <input type="email" id="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-item">
                        <label for="text">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" readonly>
                    </div>
                    <div>
                        <label for="city">City</label>
                        <select class="form-select form-select-sm mb-3" id="city" name="city">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>
                    </div>

                    <div>
                        <label for="district">District</label>
                        <select class="form-select form-select-sm mb-3" id="district" name="district">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>

                    <div>
                        <label for="ward">Ward</label>
                        <select class="form-select form-select-sm" id="ward" name="ward">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </div>

                    <div>
                        <label for="detailAddress">Detail Address</label>
                        <input type="text" id="detailAddress" name="detailAddress">
                    </div>
                    <button type="button" id="editBtn" onclick="enableEditing()">Edit</button>
                    <button type="submit" id="saveBtn" style="display:none;">Save</button>
                </div>
                @else
                    <a href="{{route('login')}}" id="login"></a>
                @endif
                <!-- <div class="login-footer">
                    <a href="">Logout</a>
                </div> -->
            </form>
        </div>
        <div class="login-right"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        function enableEditing() {
            document.getElementById('phone').removeAttribute('readonly');
            document.getElementById('editBtn').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'inline-block';
        }

        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            }
            citis.onchange = function () {
                districts.length = 1;
                wards.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);
                    for (const k of result[0].Districts) {
                        districts.options[districts.options.length] = new Option(k.Name, k.Name);
                    }
                }
            };
            districts.onchange = function () {
                wards.length = 1;
                const dataCity = data.filter(n => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Name);
                    }
                }
            };
        }
    </script>
</body>

</html>
