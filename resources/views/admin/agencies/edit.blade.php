<!DOCTYPE html>
<html>
<head>
    <title>Edit Agency</title>
</head>
<body>
    <h2>Edit Agency</h2>

    <form action="{{ route('admin.agencies.update', $agency->idAgency) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $agency->name }}">
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ $agency->phone }}">
        </div>

        <div>
                <label for="city">City</label>
                <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                    <option value="{{ $agency->address->city }}" selected>{{ $agency->address->city }}</option>           
                </select>
            </div>
            <div>
                <label for="district">District</label>
                <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                    <option value="{{ $agency->address->district }}" selected>{{ $agency->address->district }}</option>
                </select>
            </div>
            <div>
                <label for="ward">Ward</label>
                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                    <option value="{{ $agency->address->ward }}" selected>{{ $agency->address->ward }}</option>
                </select>
            </div>
            <div>
                <label for="detailAddress">Detail Address</label>
                <input type="text" id="detailAddress" name="detailAddress" value="{{ $agency->address->detailAddress }}">
            </div>
            <div>
                <label for="idTourGuide">Tour Guide</label>
                <select id="idTourGuide" name="idTourGuide">
                    <option value="" selected>Select Tour Guide</option>
                    @foreach($tourGuides as $tourGuide)
                        <option value="{{ $tourGuide->idTourGuide }}" {{ $agency->idTourGuide == $tourGuide->idTourGuide ? 'selected' : '' }}>{{ $tourGuide->name }}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit">Update Agency</button>
    </form>
</body>
</html>
