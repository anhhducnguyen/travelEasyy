<!DOCTYPE html>
<html>
<head>
    <title>Edit Tour</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Tour</h1>
        <form action="{{ route('admin.tours.update', $tour->idTour) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="idTourGuide">Tour ID</label>
                <input type="text" id="idTourGuide" name="idTourGuide" value="{{ $tour->idTour }}" readonly>
            </div>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $tour->name }}">
            </div>

            <div>
                <label for="startDay">Start Day</label>
                <input type="date" id="startDay" name="startDay" value="{{ $tour->startDay }}">
            </div>

            <div>
                <label for="endDay">End Day</label>
                <input type="date" id="endDay" name="endDay" value="{{ $tour->endDay }}">
            </div>

            <div>
                <label for="cost">Cost</label>
                <input type="text" id="cost" name="cost" value="{{ $tour->cost }}">
            </div>

            <div>
                <label for="city">City</label>
                <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->city }}" selected>{{ $tour->address->city }}</option>           
                </select>
            </div>
            <div>
                <label for="district">District</label>
                <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->district }}" selected>{{ $tour->address->district }}</option>
                </select>
            </div>
            <div>
                <label for="ward">Ward</label>
                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                    <option value="{{ $tour->address->ward }}" selected>{{ $tour->address->ward }}</option>
                </select>
            </div>
            <div>
                <label for="detailAddress">Detail Address</label>
                <input type="text" id="detailAddress" name="detailAddress" value="{{ $tour->address->detailAddress }}">
            </div>

            <div>
                <label for="idHotel">Hotel</label>
                <select id="idHotel" name="idHotel">
                    <option value="" selected>Select Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->idHotel }}" {{ $tour->idHotel == $hotel->idHotel ? 'selected' : '' }}>{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="idVehicle">Vehicle</label>
                <select id="idVehicle" name="idVehicle">
                    <option value="" selected>Select Vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->idVehicle }}" {{ $tour->idVehicle == $vehicle->idVehicle ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="idTourGuide">Tour Guide</label>
                <select id="idTourGuide" name="idTourGuide">
                    <option value="" selected>Select Tour Guide</option>
                    @foreach($tourGuides as $tourGuide)
                        <option value="{{ $tourGuide->idTourGuide }}" {{ $tour->idTourGuide == $tourGuide->idTourGuide ? 'selected' : '' }}>{{ $tourGuide->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Update Tour</button>
        </form>
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
