<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
    <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
    <option value="" selected>Chọn tỉnh thành</option>           
    </select>
            
    <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
    <option value="" selected>Chọn quận huyện</option>
    </select>

    <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
    <option value="" selected>Chọn phường xã</option>
    </select>
    </div>    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
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
        citis.options[citis.options.length] = new Option(x.Name, x.Id);
    }
    citis.onchange = function () {
        district.length = 1;
        ward.length = 1;
        if(this.value != ""){
        const result = data.filter(n => n.Id === this.value);

        for (const k of result[0].Districts) {
            district.options[district.options.length] = new Option(k.Name, k.Id);
        }
        }
    };
    district.onchange = function () {
        ward.length = 1;
        const dataCity = data.filter((n) => n.Id === citis.value);
        if (this.value != "") {
        const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

        for (const w of dataWards) {
            wards.options[wards.options.length] = new Option(w.Name, w.Id);
        }
        }
    };
    }
	</script>

    
    <h1>Thông tin tài khoản</h1>
    @if(Auth::check())
        <p>Mã tài khoản</p>
        <input type="text" id="id_account" value="{{ Auth::user()->id }}" readonly>

        <p>Họ và tên</p>
        <input type="text" id="name" value="{{ Auth::user()->name }}" readonly>
        
        <p>Email</p>
        <input type="email" id="email" value="{{ Auth::user()->email }}" readonly>

        <p>Phone</p>
        <input type="text" id="phone" value="{{ Auth::user()->phone }}" readonly>
        
        <p>Created_at:</p>
        <input type="tel" value="{{ Auth::user()->created_at }}" readonly>
    @else
        <a href="{{route('login')}}" id="login"></a>
    @endif
    <button><a href="{{route('logout_up')}}" id="a_logout">Đăng xuất</a></button>
    <a href="{{ route('index') }}" class="container-right-btn1">
        Trang chủ
    </a>
        

</body>
</html> -->




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
        <div class="logo"><a href="{{ route('index') }}">Travel Easy</a> </div>
        <div class="hamburger" id="toggle">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar" id="navbar">
            <ul>
                <li>
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li>
                    <a href="#product">Products</a>
                </li>
                <li>
                    <a href="#about">About Us</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
                <!-- <div class="login" id="login">
                    <li>
                        <a href="{{ route('login') }}" class="navlogin">Login</a>
                    </li>
                </div> -->
            </ul>
        </nav>
    </header>
    <div class="container" id="home">
        <div class="login-left">
            <div class="login-header">
                <h1>Account Information</h1>
            </div>
            <form action="" method="POST" id="registerForm" class="login-form" autocomplete="off">
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
                        <input type="text" id="phone" value="{{ Auth::user()->phone }}" readonly>
                    </div>
                </div>
                @else
                    <a href="{{route('login')}}" id="login"></a>
                @endif
                <div class="login-footer">
                    <a href="{{route('logout_up')}}">
                        Logout
                    </a>
                </div>
            </form>
        </div>
        <div class="login-right">
        </div>
    </div>

    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>