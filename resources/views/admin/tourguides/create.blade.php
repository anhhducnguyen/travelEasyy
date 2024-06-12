<!DOCTYPE html>
<html>
<head>
    <title>Create New Tour Guide</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.tourguides.index') }}">Manage Tour Guides</a></li>
                    <li><a href="{{ route('admin.tourguides.create') }}">Create Tour Guide</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2>Create New Tour Guide</h2>

            <form action="{{ route('admin.tourguides.store') }}" method="POST">
                @csrf
                <div>
                    <label for="idTourGuide">Tour Guide ID</label>
                    <input type="text" id="idTourGuide" name="idTourGuide" required>
                </div>

                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
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

                <button type="submit">Create Tour Guide</button>
            </form>
        </main>
    </div>

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
            citis.options[citis.options.length] = new Option(x.Name, x.Name); // Set value as Name
        }
        citis.onchange = function () {
            districts.length = 1;
            wards.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Name === this.value); // Filter by Name
                for (const k of result[0].Districts) {
                    districts.options[districts.options.length] = new Option(k.Name, k.Name); // Set value as Name
                }
            }
        };
        districts.onchange = function () {
            wards.length = 1;
            const dataCity = data.filter(n => n.Name === citis.value); // Filter by Name
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards; // Filter by Name
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name); // Set value as Name
                }
            }
        };
    }
</script>

</body>
</html>
