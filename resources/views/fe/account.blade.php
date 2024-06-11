<!DOCTYPE html>
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
</html>